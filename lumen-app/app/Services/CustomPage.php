<?php namespace App\Services;

class CustomPage extends Page
{

	function __construct($args = array())
	{
		$paramlist = array(
			'slug' 		=> NULL,
			'metatags'	=> array()
		);
		
		$args      = array_merge($paramlist, $args);
		extract($args);

		// initialize object
		$this->_object 		= new \stdClass();

		// initialize variables
		$this->_object->id 			= 1;
		$this->_object->page_type 	= 'custom';
		$this->_object->slug 		= $slug;

		// if we have custom metatags, then lets update them
		if ( ! empty($metatags))
			$this->_object->metatags 	= $metatags;

		return parent::__construct();
	}
	
} 
