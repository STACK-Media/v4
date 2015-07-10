<?php namespace App\Services;

use App\Models\TaxonomyModel;

class Taxonomy extends Service
{

	private $_object;

	public function __get($attrib_name)
	{

		if (is_object($this->_object) && $this->_object->$attrib_name) {
			return $this->_object->$attrib_name;
		}

		return NULL;
	}

	function initiate($type, $identifier, $identifier_type = 'slug')
	{

		$column = $identifier_type;
		$value  = $identifier;
		$regex  = "/[^a-z0-9-_]/";

		if ($identifier_type == 'id'):

			$column = 'term_id';
			$regex  = "/[^0-9]/";

		endif;

		$value = preg_replace($regex, '', $identifier);

		$this->_object = TaxonomyModel::get_by_column($type, $column, $value);

	}

	
} 
