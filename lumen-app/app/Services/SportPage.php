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

		// TODO: need to verify slug is a sport

		// set page object
		$this->_object 				= $taxonomy->get_by_column('post_tag', 'slug', $sport);
		$this->_object->page_type 	= 'sport';
		$this->_object->sport 		= $sport;
		$this->_object->meta 	 	= $taxonomy->get_metadata($this->_object->id);
		$this->_object->player    	= $player->get($this->_object->meta['stackvideoid']);
		$this->_object->video 		= $this->_object->meta['stackvideoid'];

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
