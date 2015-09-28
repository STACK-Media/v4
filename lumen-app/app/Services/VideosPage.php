<?php namespace App\Services;

class VideosPage extends Page
{

	function __construct($args = array())
	{
		$paramlist = array(
			'id'	=> NULL,
			'slug' 	=> NULL
		);
		
		$args      = array_merge($paramlist, $args);
		extract($args);

		$this->_object 		= new \stdClass();
		$this->_object->id 	= $id;

		$playerservice = new Videomanager('player');
		$player        = $playerservice->get($id);

		if ($player):

			$this->_object->player = $player;

		endif;

		return parent::__construct();
	}

	
} 
