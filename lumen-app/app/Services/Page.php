<?php namespace App\Services;

abstract class Page extends Service
{

	protected $_object;

	public function __get($attrib_name)
	{

		if (is_object($this->_object) && $this->_object->$attrib_name) {
			return $this->_object->$attrib_name;
		}

		return NULL;
	}

	public function __set($attrib_name, $value)
	{
		return $this->_object->$attrib_name = $value;
	}

	public function initiate()
	{
		if ( ! $this->_object || ! is_object($this->_object) || ! property_exists($this->_object, 'id')):

			return FALSE;

		endif;

		return TRUE;
	}

	//abstract public function initiate($args);	
} 
