<?php 

namespace App\Services;

use Cache;

class Cacheturbator extends Service
{

	protected 
		$service,
		$cache_on = FALSE;

	function __construct($service) 
	{
	
		$this->service = $service;

		if (\App::environment() !== 'local'):

			$this->cache_on = TRUE;

		endif;

	
	}

	function __get($attrib_name)
	{
		return $this->service->$attrib_name;
	}

	function __call($method_name, $args = NULL)
	{

		if ($this->cache_on):

			$cache_key = 's.'.get_class($this->service).'.m.'.$method_name.'.a.'.json_encode($args);

			if (Cache::has($cache_key)):

				return Cache::get($cache_key);

			endif;

		endif;

		$result = call_user_func_array(array($this->service, $method_name), $args);

		if ($this->cache_on):

			Cache::put($cache_key, $result, 30);

		endif;

		return $result;
    
    }
} 
