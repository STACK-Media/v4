<?php namespace App\Services;

class ContentPage extends Page
{

	function __construct($args = array())
	{
		$paramlist = array(
			'slug' 	=> NULL, 
			'type' 	=> 'publish',
			'page'	=> 'article'
		);
		
		$args      = array_merge($paramlist, $args);
		extract($args);

		// grab content manager based on page type
		$contentcms    = new Contentmanager($page);

		// grab content
		$this->_object = $contentcms->get_by_slug($slug, $type);

		// this if for article page type (doesnt hurt to be here, though)
		$video_key     = config('videomanager.article_meta_key');

		if ( ! is_object($this->_object)):

			return parent::__construct();

		endif;

		if (property_exists($this->_object, 'meta') && array_key_exists($video_key, $this->_object->meta)):

			$playerservice = new Videomanager('player');

			$video_id = $this->_object->meta[$video_key];

			$player   = $playerservice->get($video_id);

			if ($player):

				$this->_object->player = $player;

			endif;

		endif;

		if (property_exists($this->_object, 'author')):

			// initilaize content user manager
			$user = new Contentmanager('user');

			// grab author meta
			$this->_object->author['meta'] = $user->get_meta($this->_object->author['id']);

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
