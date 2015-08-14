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

		// set page object
		$this->_object 				= $taxonomy->get_by_column('post_tag', 'slug', $sport);
		$this->_object->page_type 	= 'sport';
		$this->_object->sport 		= $sport;
		$this->_object->meta 	 	= $taxonomy->get_metadata($this->_object->id);
		$this->_object->player    	= $player->get($this->_object->meta['stackvideoid']);
		$this->_object->video 		= $this->_object->meta['stackvideoid'];

		return parent::__construct();
	}

	
} 
