<?php namespace App\Services;

class VideosPage extends Page
{

	function __construct($args = array())
	{
		$paramlist = array(
			'id'		=> NULL,
			'featured'	=> array()
		);
		
		$args      = array_merge($paramlist, $args);
		extract($args);

		// initialize classes
    	$manager 	    = new Videomanager('playlist');

		$this->_object 		= new \stdClass();
		$this->_object->id 	= $id;

    	// grab videos from playlist
    	$this->_object->playlist 	= $manager->get($id);
    	$this->_object->featured 	= $manager->multiple($featured);

    	// set he video id to be played first
    	$vid 	= $this->_object->playlist['videos'][0]['id'];

		## Get Player
		$playerservice = new Videomanager('player');
		$player        = $playerservice->get($vid,$id);

		if ($player):

			$this->_object->player = $player;

		endif;
		##############

		return parent::__construct();
	}

	
} 
