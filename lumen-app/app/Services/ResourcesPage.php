<?php 
namespace App\Services;

class ResourcesPage extends Page
{

	function __construct($args = array())
	{
		$paramlist = array(
			
		);
		
		$args      = array_merge($paramlist, $args);
		extract($args);

		// set page object
		$this->_object            	= new \stdClass();
		$this->_object->page_type 	= 'resources';
		$this->_object->id        	= '1';

		return parent::__construct();
	}

	
} 
