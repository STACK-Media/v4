<?php 
namespace App\Services;

class MagazinePage extends Page
{

	function __construct($args = array())
	{
		$paramlist = array(
			'issue' 	=> FALSE
		);
		
		$args      	= array_merge($paramlist, $args);
		extract($args);

		// initialize Magazine Manager
		$magazine 	= new Contentmanager('magazine');

		// set page object
		$this->_object            	= $magazine->get($issue);
		$this->_object->page_type 	= 'magazine';
		$this->_object->issues 		= $magazine->all();
		$this->_object->articles 	= $magazine->articles($this->_object->id);

		return parent::__construct();
	}

	
} 
