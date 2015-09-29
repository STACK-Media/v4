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
			'meta'      => array(),
			'metatags'	=> array(
				'title'			=> 'Get Bigger, Stronger, Better, Faster | STACK',
				'description'	=> 'Get better at the sports you play and the life you lead at STACK. Improve your training, nutrition and lifestyle with daily',
				'image'			=> 'http://v4.stack.com/assets/img/branding/logos/stack-black.png',
				'url'			=> 'http://www.stack.com',
				'keywords'		=> array(
					'stack',
					'athlete',
					'sports',
					'training',
					'workout',
					'drills'
				)
			),
		);

		$this->_object = (object) array_merge($required, (array) $this->_object);

		return TRUE;
	}

	//abstract public function initiate($args);	
} 
