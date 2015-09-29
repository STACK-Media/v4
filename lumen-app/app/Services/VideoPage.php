<?php namespace App\Services;

class VideoPage extends Page
{

	function __construct($args = array())
	{
		$paramlist = array(
			'id'   => NULL, 
			'slug' => NULL
		);
		
		$args      = array_merge($paramlist, $args);
		extract($args);


		$videoservice  = new Videomanager('video');
		$this->_object = $videoservice->get($id);

		if ( ! is_object($this->_object)):

			return parent::__construct();

		endif;
		

		$playerservice = new Videomanager('player');
		$player        = $playerservice->get($id);

		if ($player):

			$this->_object->player = $player;

		endif;

		// set custom meta tags
		$this->_object->metatags 	= $this->_get_metatags();

		return parent::__construct();
	}

	private function _get_metatags()
	{
		// initialize variables
		$metatags 	= array();

		// set title
		$metatags['title']			= $this->_object->name;
		$metatags['description']	= $this->_object->shortDescription;
		$metatags['image']			= $this->_object->videoStillURL;
		$metatags['keywords']		= $this->_object->tags;

		return $metatags;
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
