<?php namespace App\Services;

class AuthorPage extends Page
{

	function __construct($args = array())
	{
		$paramlist = array(
			'slug' => NULL
		);
		
		$args      = array_merge($paramlist, $args);
		extract($args);


		$authorservice = new Contentmanager('user');
		$this->_object = $authorservice->get_by_slug($slug);

		if (property_exists($this->_object, 'id')):

			$this->_object->meta = $authorservice->get_meta($this->_object->id);

			$articleservice = new Contentmanager('article');

			$this->_object->posts = $articleservice->get_by_user_id($this->_object->id);

		endif;

		return parent::__construct();

	}
	
} 
