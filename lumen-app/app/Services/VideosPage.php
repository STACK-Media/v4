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

		// set custom meta tags
		$this->_object->metatags 	= $this->_get_metatags();

		return parent::__construct();
	}

	private function _get_metatags()
	{
		// initialize variables
		$metatags 	= array();

		$metatags['title']			= "STACK TV | STACK Videos";
		$metatags['description']	= "Watch STACK TV for the latest training, nutrition and lifestyle videos from your favorite pro athletes.";

		// grab meta from first video in playlist (since playlist variables aren't set)
		foreach ($this->_object->playlist['videos'] AS $key => $value):

			// set tag info
			$metatags['image']			= $value['videoStillURL'];
			$metatags['keywords']		= $value['tags'];

			// we only needed to grab the first
			break;

		endforeach;

		return $metatags;
	}

	
} 
