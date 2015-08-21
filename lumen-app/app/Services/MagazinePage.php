<?php 
namespace App\Services;

class MagazinePage extends Page
{

	function __construct($args = array())
	{
		$paramlist = array(
			'issue' 	=> NULL
		);
		
		$args      = array_merge($paramlist, $args);
		extract($args);

		// initialize Magazine Manager
		$manager 	= new Contentmanager('magazine');

		// set page object
		$this->_object            = new \stdClass();
		$this->_object->page_type = 'magazine';
		$this->_object->id        = '1';

		return parent::__construct();
	}

	
} 
