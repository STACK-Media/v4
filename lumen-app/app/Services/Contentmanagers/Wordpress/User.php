<?php 

namespace App\Services\Contentmanagers\Wordpress;

use App\Models\ContentModels\Wordpress\UserModel;

class User extends Wordpress
{

	private $_model;

	public function __construct()
	{
		parent::__construct();

		$this->_model = new UserModel;
	}

	public function get($id)
	{
		return $this->_model->get($id);
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
		return $this->_model->get_meta($id);
	}
}