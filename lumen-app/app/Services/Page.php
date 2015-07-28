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
		if ( ! is_object($this->_object)):

			return FALSE;

		endif;

		return $this->_object->$attrib_name = $value;
	}

	public function __construct()
	{
		if ( ! $this->_object || ! is_object($this->_object) || ! property_exists($this->_object, 'id')):

			abort('404');

		endif;

		return TRUE;
	}

	//abstract public function initiate($args);	
} 
