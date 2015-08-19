<?php 
namespace App\Services;

class SearchPage extends Page
{

	function __construct($args = array())
	{
		$paramlist = array(
			'term' 	=> NULL
		);
		
		$args      = array_merge($paramlist, $args);
		extract($args);

		// set page object
		$this->_object            	= new \stdClass();
		$this->_object->page_type 	= 'search';
		$this->_object->id        	= '1';
		$this->_object->term 		= $term;

		return parent::__construct();
	}

	
} 
