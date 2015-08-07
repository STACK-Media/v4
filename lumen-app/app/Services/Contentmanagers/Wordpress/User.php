<?php 

namespace App\Services\Contentmanagers\Wordpress;

use App\Models\ContentModels\Wordpress\UserModel;
use App\Services\Cacheturbator as Cacher;

class User extends Wordpress
{

	private $_model;

	public function __construct()
	{
		parent::__construct();

		$this->_model = new Cacher(new UserModel);
	}

	public function get($id)
	{
		return $this->_model->get_by_id($id);
	}

	public function get_by_slug($slug)
	{
		return $this->_model->get_by_slug($slug);
	}	

	public function get_featured()
	{
		return $this->_model->get_featured();
	}

	public function get_meta($id)
	{
		return $this->_format_meta($this->_model->get_meta($id));
	}

	private function _format_meta($meta)
	{

		if ( ! $meta):

			return NULL;

		endif;

		$meta_array = array();

		foreach ($meta as $meta_obj):

			$meta_array[$meta_obj->meta_key] = $meta_obj->meta_value;

		endforeach;

		$social = array(
			'googlePlus' => 'plus.google.com',
			'facebook'   => 'facebook.com',
			'twitter'    => 'twitter.com'
		);

		$meta_key['social'] = array();

		foreach($social as $site => $url):

			if (array_key_exists($site, $meta_array) && $meta_array[$site]):

				if (strpos($meta_array[$site], '.com') === FALSE):

					$meta_array[$site] = $url . '/' .$meta_array[$site] . '?rel=author';

				endif;

				if (strpos($meta_array[$site], 'http') === FALSE):

					if (strpos($meta_array[$site], 'www') === FALSE):

						$meta_array[$site] = 'www.'.$meta_array[$site];

					endif;

					$meta_array[$site] = 'https://'.$meta_array[$site];

				endif;

				$meta_array['social'][$site] = $meta_array[$site];

				unset($meta_array[$site]);

			endif;

		endforeach;

		return $meta_array;

		/*
		$data 	= array();
		foreach($meta AS $key => $value):
			$data[$value->meta_key]	= array(
				'meta_id'	=> $value->umeta_id,
				'user_id'	=> $value->user_id,
				'value'		=> $value->meta_value
			);
		endforeach;

		return $data;
		*/
	}
}