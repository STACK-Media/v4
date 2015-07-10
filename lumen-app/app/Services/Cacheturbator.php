<?php namespace App\Services;

class Cacheturbator extends Service
{

	protected $service;

	function __construct($service) {
		$this->service = $service;
	}

	function __get($attrib_name)
	{
		return $this->service->$attrib_name;
	}

	function __call($method_name, $args) 
	{

		if (FALSE && $is_cached):

			return $cache;

		endif;

		return call_user_func_array(array($this->service, $method_name), $args);
    
    }
} 
