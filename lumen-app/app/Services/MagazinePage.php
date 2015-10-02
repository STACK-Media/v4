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

		// initialize magazine config
		app()->configure('magazine');

		// initialize Magazine Manager
		$magazine 	= new Contentmanager('magazine');

		// if no issue is passed, grab default from config
		if ( ! $issue)
			$issue 	= config('magazine.current');

		// set page object

		$mag = $magazine->get($issue);
		
		if (is_object($mag)):

			$this->_object            	= $mag;
			$this->_object->page_type 	= 'magazine';
			$this->_object->issues 		= $magazine->all();
			$this->_object->articles 	= $magazine->articles($this->_object->id);

			// grab custom metatags
			$this->_object->metatags 	= $this->_get_metatags();

		endif;

		return parent::__construct();
	}

	private function _get_metatags()
	{
		// initialize variables
		$metatags 	= array();

		// set any custom tags
		$metatags['title']		= 'STACK Magazine';

		// return the tags
		return $metatags;
	}

	
} 
