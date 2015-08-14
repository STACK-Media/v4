<?php 
namespace App\Services;

class SportPage extends Page
{

	function __construct($args = array())
	{
		$paramlist = array(
			'sport' 	=> NULL
		);
		
		$args      = array_merge($paramlist, $args);
		extract($args);

		// initialize content manager
		$content 	= new Contentmanager('taxonomy');

		// set page object
		$this->_object 				= $content->get_by_column('post_tag', 'slug', $sport);
		$this->_object->page_type 	= 'sport';
		$this->_object->sport 		= $sport;

		return parent::__construct();
	}

	
} 
