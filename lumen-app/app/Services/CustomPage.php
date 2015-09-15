<?php namespace App\Services;

class CustomPage extends Page
{

	function __construct($args = array())
	{
		$paramlist = array(
			'slug' => NULL
		);
		
		$args      = array_merge($paramlist, $args);
		extract($args);

		// initialize object
		$this->_object 		= new \stdClass();

		// initialize variables
		$this->_object->id 			= 1;
		$this->_object->page_type 	= 'custom';
		$this->_object->slug 		= $slug;

		return parent::__construct();

	}
	
} 
