<?php namespace App\Models;

use DB;

class Taxonomy extends Model
{

	public $_object;

	function __construct($type, $identifier, $identifier_type = 'slug')
	{

		$column = $identifier_type;
		$value  = $identifier;

		if ($identifier_type == 'slug'):

			// move this sanitation into a service?
			$value  = preg_replace("/[^a-z0-9-_]/", '', strtolower($identifier));

		else:

			// move this sanitation into a service?
			$column = 'term_id';
			$value  = preg_replace("/[^0-9]/", '', $identifier);

		endif;

		$this->_object = $this->_get_by_column($type, $column, $value);

	}

	public function __get($attrib_name)
	{

		if ($this->_object->$attrib_name) {
			return $this->_object->$attrib_name;
		}

		return NULL;
	}

	private function _get_by_column($type, $column, $value)
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
