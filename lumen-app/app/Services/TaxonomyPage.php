<?php namespace App\Services;

class TaxonomyPage extends Page
{

	function __construct($args = array())
	{

		$paramlist = array(
			'type'            => NULL, 
			'identifier'      => NULL, 
			'identifier_type' => 'slug'
		);
		
		$args      = array_merge($paramlist, $args);
		extract($args);

		$identifier = strtolower($identifier);

		$cms = new Contentmanager('taxonomy');

		$this->_object = $cms->get_by_column($type, $identifier_type, $identifier);

		if (is_object($this->_object) && property_exists($this->_object, 'id')):

			// Making category page object match other pages
			$tax_template = array(
				'term_id',
				'term_taxonomy_id',
				'description',
				'name',
				'slug',
				'parent'
			);

			$tax_template = array_combine($tax_template, array_fill(0, count($tax_template), NULL));
			
			$category                     = (array) $this->_object;
			$category['term_id']          = $category['id'];
			$category['term_taxonomy_id'] = $category['id'];
			$category['parent']           = array(
				'id'   => $category['parent_id'],
				'name' => $category['parent_id'],
				'slug' => $category['parent_id'],
			);

			$category     = array_intersect_key($category, $tax_template);
			$category     = array_merge($tax_template, $category);

			$category['meta'] = $cms->get_metadata($category['term_id']);

			// set latest videos & player objects
			$this->_object->latest 	= $this->_latest_videos_object();
			$this->_object->player 	= $this->_player_object();


			$this->_object->taxonomy = array(
				$this->_object->taxonomy => array(
					(object) $category
				)
			);
			// End making category page object consistent w/ other pages

			// set custom meta tags
			$this->_object->metatags 	= $this->_get_metatags();


		endif;

		return parent::__construct();

	}

	private function _get_metatags()
	{
		// initialize variables
		$metatags 	= array();
		if (isset($this->_object->name))
			$metatags['title'] 			= $this->_object->name;
		
		if (isset($this->_object->description))
			$metatags['description'] 	= $this->_object->description;

		if (isset($this->_object->image))
			$metatags['image'] 			= $this->_object->image;

		// add categories
		if (isset($this->_object->taxonomy['category'])):

			foreach ($this->_object->taxonomy['category'] AS $key => $value):

				// set metatags
				$metatags['keywords'][]		= $value->name;

			endforeach;

		endif;

		// add tags
		if (isset($this->_object->taxonomy['post_tag'])):
		
			foreach ($this->_object->taxonomy['post_tag'] AS $key => $value):

				// add tag name as keyword
				$metatags['keywords'][]	= $value->name;

			endforeach;

		endif;

		// add parent cat/tag if existss
		if (isset($this->_object->parent_name) AND $this->_object->parent_name != '')
			$metatags['keywords'][]	= $this->_object->parent_name;

		return $metatags;
	}

	private function _latest_videos_object()
	{
		################
		## [START] Get Latest Videos to power video player (for some stupid reason)
		$manager 				= new Videomanager('video');

		// grab page number (default to 0)
		$pg_num 		= (isset($this->_object->page_number))? $this->_object->page_number: 0;

		// set latest videos object
		return $manager->latest_by_category($this->_object->name,5,$pg_num);
	}

	private function _player_object()
	{
		// load services 
		$manager  	= new Videomanager('player');

		if ( ! isset($this->_object->latest[0]))
			return NULL;

		// initialize variables
		// TODO: This method assumes this ID exists - is that ok?
		$video_id 	= $this->_object->latest[0]['id'];

		// return player object
		return $manager->get($video_id);
	}
} 
