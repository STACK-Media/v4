<?php 

namespace App\Services;

use App\Services\Cacheturbator as Cacher;

class Contentmanager extends Service
{

	private $_namespace = 'Wordpress';

	protected $_class;

	function __construct($content_type)
	{
		parent::__construct();

		app()->configure('contentmanager');

		$this->_namespace = config('contentmanager.manager');

		$content_type = ucwords(preg_replace('/[^a-z0-9]/', '', strtolower($content_type)));

		$class = 'App\\Services\\Contentmanagers\\'.$this->_namespace.'\\'.$content_type;

		$this->_class = new Cacher(new $class());
	}

	public function __get($attrib_name)
	{

		if (is_object($this->_class) && $this->_class->$attrib_name) {
			return $this->_class->$attrib_name;
		}

		return NULL;
	}

	public function __set($attrib_name, $value)
	{
		return $this->_class->$attrib_name = $value;
	}

	public function __call($method_name, $args = NULL)
	{

		return call_user_func_array(array($this->_class, $method_name), $args);
    
    }

}