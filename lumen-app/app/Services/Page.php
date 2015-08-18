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

		$required = array(
			'taxonomy'  => array(),
			'page_type' => NULL,
			'name'      => '',
			'meta'      => array()
		);

		$this->_object = (object) array_merge($required, (array) $this->_object);

		$navservice    = new Contentmanager('navigation');

		$this->_object->nav = $navservice->get(array(
			'type'     => $this->_object->page_type,
			'name'     => $this->_object->name,
			'id'       => $this->_object->id,
			'subtheme' => config('theming.subtheme'),
			'theme'    => config('theme.theme')
		));

		return TRUE;
	}

	//abstract public function initiate($args);	
} 
