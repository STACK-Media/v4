<?php namespace App\Services;

class TaxonomyPage extends Page
{

	function initiate($args = array())
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

		return parent::initiate();

	}

	
} 
