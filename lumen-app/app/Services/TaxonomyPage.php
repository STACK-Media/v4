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

		$cms = new Contentmanager('taxonomy');

		$this->_object = $cms->get_by_column($type, $identifier_type, $identifier);

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


		$this->_object->taxonomy = array(
			$this->_object->taxonomy => array(
				(object) $category
			)
		);
		// End making category page object consistent w/ other pages

		return parent::__construct();

	}

	
} 
