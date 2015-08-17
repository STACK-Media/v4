<?php 
namespace App\Services;

class HomePage extends Page
{

	function __construct($args = array())
	{
		$paramlist = array(
			'playlist_id' 	=> NULL
		);
		
		$args      = array_merge($paramlist, $args);
		extract($args);

		// initialize video manager
		$playlistservice 	= new Videomanager('playlist');
		$playerservice		= new Videomanager('player');

		// set playlist information
		$playlist 			= $playlistservice->get($playlist_id);

		// set video (1st id in the playlist)
		$videos 			= $playlist['playlist']['videos'][0];

		// grab player information
		## TODO: The player service needs updated to allow page template (that should determine player - right?)
		$player 			= $playerservice->get($videos['id']);

		// set page object
		$this->_object            = new \stdClass();
		$this->_object->page_type = 'home';
		
		//$this->_object->id        = $playlist_id; // why set the playlist_id to homepage->id?
		$this->_object->id        = '1';

		$this->_object->player    = $player;
		$this->_object->playlist  = $playlist['playlist'];
		$this->_object->video     = $videos;

		return parent::__construct();
	}

	
} 
