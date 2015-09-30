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
	
		if ( $this->_object && is_object($this->_object) && property_exists($this->_object, 'id')):

			$required = array(
				'taxonomy'  => array(),
				'page_type' => NULL,
				'name'      => '',
				'meta'      => array(),
				'metatags'	=> array(
					'title'			=> 'Get Bigger, Stronger, Better, Faster',
					'description'	=> 'Get better at the sports you play and the life you lead at STACK. Improve your training, nutrition and lifestyle with daily',
					'image'			=> 'http://v4.stack.com/assets/img/branding/logos/stack-black.png',
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

			// merge metatags before merging with page object
			if (property_exists($this->_object, 'metatags')):

				// set metatags (after merging with defaults)
				$this->_object->metatags	= array_merge($required['metatags'], (array) $this->_object->metatags);

			endif;

			$this->_object = (object) array_merge($required, (array) $this->_object);

		endif;

		return TRUE;
	}

	//abstract public function initiate($args);	
} 
