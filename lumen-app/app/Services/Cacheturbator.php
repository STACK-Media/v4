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

			$cache_key = 's.'.get_class($this->service).'.a.'.$attrib_name;

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

	function __set($attrib_name, $value)
	{

		if ($this->cache_on):

			$class = get_class($this->service);

			if (strpos($class, '/') !== FALSE):

				$class = join('', array_slice(explode('\\', $class), -1))

			endif;

			$cache_key = 's.'.$class.'.a.'.$attrib_name.'.v.'.json_encode($value);

			if ( ! $this->flush && Cache::has($cache_key)):

				return Cache::get($cache_key);

			endif;

		endif;

		$result = $this->service->$attrib_name = $value;

		if ($this->cache_on):

			Cache::put($cache_key, $result, mt_rand($this->min_cache, $this->max_cache));

		endif;

		return $result;
	}

	function __call($method_name, $args = NULL)
	{

		if ($this->cache_on):

			$class = get_class($this->service);

			if (strpos($class, '/') !== FALSE):

				$class = join('', array_slice(explode('\\', $class), -1))

			endif;

			$cache_key = 's.'.$class.'.m.'.$method_name.'.a.'.json_encode($args);

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
} 
