<?php namespace App\Models;

class CategoryModel extends Model
{

	function __construct($identifier, $identifier_type = 'slug')
	{

	}

	function get_by_slug($slug){

		$slug = preg_replace("/[^a-z0-9-_]/", '', strtolower($slug));


		return DB::table('wp_terms')
    		->select(
    			'wp_terms.term_id', 
    			'wp_terms.name',
    			'wp_terms.slug', 
    			'wp_term_taxonomy.taxonomy', 
    			'wp_term_taxonomy.parent', 
    			'parent_terms.term_id AS parent_id', 
    			'parent_terms.name AS parent_name', 
    			'parent_terms.slug AS parent_slug'
    		)
    		->where('wp_terms.slug',$slug)
    		->join(
    			'wp_term_taxonomy', 
    			'wp_terms.term_id', '=', 'wp_term_taxonomy.term_id'
    		)
    		->leftJoin(
    			'wp_terms AS parent_terms', 
    			'wp_term_taxonomy.parent', '=', 'parent_terms.term_id'
    		)
    		->take(1)->get();

	}
   
} 
