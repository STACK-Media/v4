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

		$this->_object->metatags 	= $this->_get_metatags();

		return parent::__construct();
	}

	private function _get_metatags()
	{
		print "<pre>";
		print_r($this->_object);
		exit;
		// initialize variables
		$metatags 	= array();

		// set meta tags
		$metatags['title']			= $this->_object;
		$metatags['description']	= $this->_object;

		return $metatags;
	}
	
} 
