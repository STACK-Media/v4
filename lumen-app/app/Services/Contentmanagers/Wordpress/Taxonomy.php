<?php 

namespace App\Services\Contentmanagers\Wordpress;

use App\Models\ContentModels\Wordpress\TaxonomyModel;
use App\Services\Cacheturbator as Cacher;

class Taxonomy extends Wordpress
{

	private $_model;

	function __construct()
	{
		parent::__construct();

		$this->_model = new Cacher(new TaxonomyModel);
	}

	function all($type='category')
	{
		return $this->_model->all($type);
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

	function get_metadata($id)
	{
		return $this->_format_meta($this->_model->get_term_tax_metadata($id));
	}

	function get_by_article_id($article_id)
	{
		$categories = $this->_model->get_by_article_id($article_id);

		$categories = $this->_format_taxonomies($categories);

		return $this->_format_array($categories);
		
	}

	function _format_taxonomies($tax)
	{
		$ttids = array();

        foreach ($tax as $key => $row):

            $ttids[] = $row->term_taxonomy_id;

        endforeach;

        $meta      = $this->_model->get_term_tax_metadata($ttids);
        $metaclean = array();

        foreach ($meta as $key => $arr):

            $meta_key = strtolower($arr->meta_key);
            $meta_val = $arr->meta_value;

            preg_match_all("/(.*?)_(\d+)$/", $meta_key, $matches);

            if ($matches[0]):

                $meta_num = $matches[2][0];
                $meta_key = $matches[1][0];

                $metaclean[$arr->term_taxonomy_id][$meta_key][$meta_num] = $meta_val;

            else:

                $metaclean[$arr->term_taxonomy_id][$meta_key] = $meta_val;

            endif;

        endforeach;

        foreach ($tax as $key => $row):

            if ( ! array_key_exists($row->term_taxonomy_id, $metaclean)):

                continue;

            endif;

            $tax[$key]->meta = $metaclean[$row->term_taxonomy_id];

        endforeach;

        return $tax;
	}

	function _format_meta($meta)
	{
        $metaclean = array();

        foreach ($meta as $key => $arr):

            $meta_key = strtolower($arr->meta_key);
            $meta_val = $arr->meta_value;

            preg_match_all("/(.*?)_(\d+)$/", $meta_key, $matches);

            if ($matches[0]):

                $meta_num = $matches[2][0];
                $meta_key = $matches[1][0];

                $metaclean[$meta_key][$meta_num] = $meta_val;

            else:

                $metaclean[$meta_key] = $meta_val;

            endif;

        endforeach;

        return $metaclean;
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