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

		if ( ! in_array($page, array('article', 'page'))):

			return parent::__construct();

		endif;

		// grab content manager based on page type
		$contentcms    = new Contentmanager(ucwords($page));

		// grab content
		$this->_object = $contentcms->get_by_slug($slug, $type);

		if ( ! is_object($this->_object)):

			return parent::__construct();

		endif;

		// explicitly set page type
		$this->_object->page_type 	= $page;

		// this if for article page type (doesnt hurt to be here, though)
		$video_key     = 'top_video_id';//config('videomanager.article_meta_key');

		## Get Video Data
		if (property_exists($this->_object, 'meta') && array_key_exists($video_key, $this->_object->meta)):

			// load the service needed
			$playerservice = new Videomanager('player');

			// grab video id
			$video_id = $this->_object->meta[$video_key];

			// get player
			$player   = $playerservice->get($video_id);

			if ($player):

				// set player objet
				$this->_object->player = $player;

			endif;

		endif;

		## Author Data
		if (property_exists($this->_object, 'author')):

			// initilaize content user manager
			$user = new Contentmanager('user');

			// grab author meta
			$this->_object->author['meta'] = $user->get_meta($this->_object->author['id']);

		endif;

		// set custom meta tags
		$this->_object->metatags 	= $this->_get_metatags();


		return parent::__construct();
	}

	protected function _get_metatags()
	{
		// initialize variables
		$metatags 	= array();

		// set applicable metatags
		// NOTE: do not set to blank - it will override the defaults
		if (isset($this->_object->name))
			$metatags['title'] 			= $this->_object->name;
		
		if (isset($this->_object->meta['description']))
			$metatags['description'] 	= $this->_object->meta['description'];

		if (isset($this->_object->image))
			$metatags['image'] 			= $this->_object->image;
			
		// add categories
		if (isset($this->_object->taxonomy['category'])):

			foreach ($this->_object->taxonomy['category'] AS $key => $value):

				$metatags['keywords'][]	= $value->name;

				// grab parent category (if exists)
				if (isset($value->parent['name']))
					$metatags['keywords'][]	= $value->parent['name'];

				// grab category meta (if exists)
				if (isset($value->meta['related_link_text'])):

					// iterate related link text
					foreach ($value->meta['related_link_text'] AS $keys => $values):

						// add as keyword
						$metatags['keywords'][]	= $values;

					endforeach;

				endif;

				// more meta as keywords
				if (isset($value->meta['menudisplaytext']))
					$metatags['keywords'][]	= $value->meta['menudisplaytext'];

			endforeach;

		endif;

		// add tags
		if (isset($this->_object->taxonomy['post_tag'])):
		
			foreach ($this->_object->taxonomy['post_tag'] AS $key => $value):

				// add tag name as keyword
				$metatags['keywords'][]	= $value->name;

				// grab tag meta (if exists)
				if (isset($value->meta['related_link_text'])):

					// iterate related link text
					foreach ($value->meta['related_link_text'] AS $keys => $values):

						// add as keyword
						$metatags['keywords'][]	= $values;

					endforeach;

				endif;

			endforeach;

		endif;

		// add site type as keyword
		if (isset($this->_object->site_type)):

			// iterate all site types (even though there's probably only one)
			foreach ($this->_object->site_type AS $key => $value):

				// add site type as keyword
				$metatags['keywords'][]	= $value->name;

				// grab any parent's
				if (isset($value->parent['name']) AND $value->parent['name'] != '')
					$metatags['keywords'][]	= $value->parent['name'];

			endforeach;

		endif;

		// grab SEO Plugin Meta & override any variables

		return $metatags;
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
