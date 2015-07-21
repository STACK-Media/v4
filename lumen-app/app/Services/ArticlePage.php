<?php namespace App\Services;

class ArticlePage extends Page
{

	function initiate($args = array())
	{
		$paramlist = array(
			'slug' => NULL, 
			'type' => 'publish'
		);
		
		$args      = array_merge($paramlist, $args);
		extract($args);

		$articlecms = new Contentmanager('article');

		$this->_object = $articlecms->get_by_slug($slug, $type);

		return parent::initiate();
	}


	/*
	function initiate($args = array())
	{

		$paramlist = array(
			'id'   => NULL, 
			'type' => 'publish'
		);
		
		$args      = array_merge($paramlist, $args);
		extract($args);

		$cms = new Contentmanager('article');

		$this->_object = $cms->get_by_id($id, $type);
	}
	*/

	
} 
