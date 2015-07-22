<?php 

namespace App\Services\Contentmanagers\Wordpress;

use App\Models\ContentModels\Wordpress\TaxonomyModel;

class Taxonomy extends Wordpress
{

	private $_model;

	function __construct()
	{
		parent::__construct();

		$this->_model = new TaxonomyModel;
	}

	function get_by_column($type, $identifier_type, $identifier)
	{

		$column = $identifier_type;
		$value  = $identifier;
		$regex  = "/[^a-z0-9-_]/";

		if ($identifier_type == 'id'):

			$column = 'term_id';
			$regex  = "/[^0-9]/";

		endif;

		$value = preg_replace($regex, '', $identifier);

		return $this->_model->get_by_column($type, $column, $value);

	}

	function get_by_article_id($article_id)
	{
		$categories = $this->_model->get_by_article_id($article_id);

		return $this->_format_array($categories);
		
	}

	function _format_array($categories)
	{

		$categories = $this->_format_parent_fields($categories);

		$categories = $this->_sort_types($categories);

		return $categories;
	}

	function _sort_types($categories)
	{
		$sorted = array(
			'category' => array(),
			'post_tag' => array()
		);

		if ( ! $categories || ! is_array($categories)):

			return $sorted;

		endif;

		foreach($categories as $key => $category):

			$type = $category->taxonomy;
			unset($category->taxonomy);

			$sorted[$type][] = $category;

		endforeach;

		return $sorted;

	}

	function _format_parent_fields($categories)
	{
		if ( ! $categories || ! is_array($categories)):

			return $categories;

		endif;

		foreach($categories as $key => $category):

			$category->parent = array(
				'id'   => $category->parent_id,
				'name' => $category->parent_name,
				'slug' => $category->parent_slug
			);

			unset($category->parent_id);
			unset($category->parent_name);
			unset($category->parent_slug);

			$categories[$key] = $category;

		endforeach;

		return $categories;
	}

}