<?php namespace App\Models;

use DB;

class TaxonomyModel extends Model
{

	static function get_by_column($type, $column, $value)
	{
		return DB::table('wp_terms')
    		->select(
    			'wp_terms.term_id AS id', 
    			'wp_terms.name',
    			'wp_terms.slug', 
    			'wp_term_taxonomy.taxonomy', 
    			'parent_terms.term_id AS parent_id', 
    			'parent_terms.name AS parent_name', 
    			'parent_terms.slug AS parent_slug'
    		)
    		->where('wp_terms.'.$column, $value)
    		->where('wp_term_taxonomy.taxonomy', $type)
    		->join(
    			'wp_term_taxonomy', 
    			'wp_terms.term_id', '=', 'wp_term_taxonomy.term_id'
    		)
    		->leftJoin(
    			'wp_terms AS parent_terms', 
    			'wp_term_taxonomy.parent', '=', 'parent_terms.term_id'
    		)
    		->take(1)->first();
	}
   
} 
