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

			return FALSE;

		endif;

		

		$playerservice = new Videomanager('player');
		$player        = $playerservice->get($id);

		if ($player):

			$this->_object->player = $player;

		endif;

		return parent::__construct();
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
