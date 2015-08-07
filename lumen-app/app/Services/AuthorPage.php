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

		return parent::__construct();

	}
	
} 
