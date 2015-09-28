<?php 
namespace App\Services;

class MarketingPage extends Page
{

	function __construct($args = array())
	{
		$paramlist = array(
			'slug' 		=> NULL,	// default slug (page template) 
			'player' 	=> '',		// default player
			'playlist'	=> '',		// default playlist
			'video'		=> ''		// default video
		);
		
		$args      = array_merge($paramlist, $args);
		extract($args);

		// intiialize video manager
		$playercms 		= new Videomanager('player');
		$playlistcms 	= new Videomanager('playlist');

		// initialize page object
		$this->_object 				= new \stdClass();

		// initialize object variables
		$this->_object->id 			= $slug;
		$this->_object->playlist 	= $playlistcms->get($playlist);
		$this->_object->player 		= $playercms->get($video,$playlist);
		$this->_object->page_type 	= 'marketing';

		// set theme

		return parent::__construct();
	}

}