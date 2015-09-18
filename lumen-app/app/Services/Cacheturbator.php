<?php 

namespace App\Services;

use Cache;
use Request;

class Cacheturbator extends Service
{

	protected 
		$service,
		$cache_on  = FALSE,
		$flush     = FALSE,
		$min_cache = 30,
		$max_cache = 45;

	function __construct($service) 
	{
	
		$this->service = $service;

		if (\App::environment() !== 'local'):

			$this->cache_on = TRUE;

		endif;

		if (Request::input('flushcache')):

			$this->flush = TRUE;

		endif;

	}

	function __get($attrib_name)
	{

		if ($this->cache_on):

			$cache_key = 's.'.$this->_get_class_name().'.a.'.$attrib_name;
			$cache_key = $this->_limit_key_size($cache_key);

			if ( ! $this->flush && Cache::has($cache_key)):

				return Cache::get($cache_key);

			endif;

		endif;

		$result = $this->service->$attrib_name;

		if ($this->cache_on):

			Cache::put($cache_key, $result, mt_rand($this->min_cache, $this->max_cache));

		endif;

		return $result;
	}

	private function _get_class_name()
	{
		$class = get_class($this->service);

		if (strpos($class, '\\') !== FALSE):

			$class = join('', array_slice(explode('\\', $class), -1));

		endif;

		return $class;
	}

	function __set($attrib_name, $value)
	{

		if ($this->cache_on):

			$cache_key = 's.'.$this->_get_class_name().'.a.'.$attrib_name.'.v.'.json_encode($value);
			$cache_key = $this->_limit_key_size($cache_key);

			Cache::put($cache_key, $value, mt_rand($this->min_cache, $this->max_cache));

		endif;

		$this->service->$attrib_name = $value;



		/*
		if ($this->cache_on):

			$cache_key = 's.'.$this->_get_class_name().'.a.'.$attrib_name.'.v.'.json_encode($value);
			$cache_key = $this->_limit_key_size($cache_key);

			if ( ! $this->flush && Cache::has($cache_key)):

				return Cache::get($cache_key);

			endif;

		endif;

		$result = $this->service->$attrib_name = $value;

		if ($this->cache_on):

			Cache::put($cache_key, $result, mt_rand($this->min_cache, $this->max_cache));

		endif;

		return $result;
		*/
	}

	function __call($method_name, $args = NULL)
	{

		if ($this->cache_on):

			$cache_key = 's.'.$this->_get_class_name().'.m.'.$method_name.'.a.'.json_encode($args);
			$cache_key = $this->_limit_key_size($cache_key);

			if ( ! $this->flush && Cache::has($cache_key)):

				return Cache::get($cache_key);

			endif;

		endif;

		$result = call_user_func_array(array($this->service, $method_name), $args);

		if ($this->cache_on):

			Cache::put($cache_key, $result, mt_rand($this->min_cache, $this->max_cache));

		endif;

		return $result;
    
    }

    private function _limit_key_size($cache_key)
    {
    	var_dump($cache_key);

    	$cache_key = preg_replace("/[^a-zA-Z0-9]/", "", $cache_key);

    	var_dump($cache_key);

    	if (mb_strlen($cache_key, 'UTF-8') > 250):

			$cache_key = substr(md5($cache_key), 0, 250);
		
		endif;

		var_dump($cache_key);exit();

		return $cache_key;
    }
} 
