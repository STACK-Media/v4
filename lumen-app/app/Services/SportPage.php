<?php 
namespace App\Services;

class SportPage extends Page
{

	function __construct($args = array())
	{
		$paramlist 	= array(
			'sport' 	=> NULL
		);
		
		$args      	= array_merge($paramlist, $args);
		extract($args);

		// initialize content manager
		$taxonomy 	= new Contentmanager('taxonomy');
		$player 	= new Videomanager('player');
		$playlist 		= new Videomanager('playlist');

		// TODO: need to verify slug is a sport

		// set page object
		$this->_object 				= $taxonomy->get_by_column('post_tag', 'slug', $sport);
		$this->_object->page_type 	= 'sport';
		$this->_object->sport 		= $sport;
		$this->_object->meta 	 	= $taxonomy->get_metadata($this->_object->id);

		// if there is a playlist set, lets us it to set player object(s)
		if (isset($this->_object->meta['stackvideoid']) AND is_numeric($this->_object->meta['stackvideoid'])):

			// grab playlist information
			$this->_object->playlist 	= $playlist->get($this->_object->meta['stackvideoid'], 8);

			// set player object (if we have a valid video from the playlist)
			if (isset($this->_object->playlist['videoIds']) AND ! empty($this->_object->playlist['videoIds']))
				$this->_object->player    	= $player->get($this->_object->playlist['videoIds'][0],$this->_object->meta['stackvideoid']);

		endif;

		// set custom metatags
		$this->_object->metatags 	= $this->_get_metatags();

		return parent::__construct();
	}

	private function _get_metatags()
	{
		// initialize variables
		$metatags 	= array();

		$metatags['title']			= ucwords($this->_object->sport).' Workouts | '.ucwords($this->_object->sport).' Drills';
		$metatags['description']	= 'Find '.$this->_object->sport.' workouts, drills, training advice and nutrition tips updated daily on STACK.com.';
		$metatags['keywords']		= array(
			'workouts',
			'drills',
			'training',
			'nutrition',
			'sports',
			$this->_object->sport
		);

		return $metatags;
	}
	
} 
