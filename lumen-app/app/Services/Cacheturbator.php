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

				return unserialize(Cache::get($cache_key));

			endif;

		endif;

		$result = $this->service->$attrib_name;

		if ($this->cache_on):

			Cache::put($cache_key, serialize($result), mt_rand($this->min_cache, $this->max_cache));

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

			$cache_key = 's.'.$this->_get_class_name().'.a.'.$attrib_name.'.v.'.serialize($value);
			$cache_key = $this->_limit_key_size($cache_key);

			Cache::put($cache_key, serialize($value), mt_rand($this->min_cache, $this->max_cache));

		endif;

		$this->service->$attrib_name = $value;
	}

	function __call($method_name, $args = NULL)
	{

		if ($this->cache_on):

			$cache_key = 's.'.$this->_get_class_name().'.m.'.$method_name.'.a.'.serialize($args);
			$cache_key = $this->_limit_key_size($cache_key);

			if ( ! $this->flush && Cache::has($cache_key)):

				return unserialize(Cache::get($cache_key));

			endif;

		endif;

		$result = call_user_func_array(array($this->service, $method_name), $args);

		if ($this->cache_on):

			if ($result):

				file_put_contents('/var/www/CACHE_PUT_LOG.log', '--------CACHE_KEY--------'."\n".$cache_key."\n".'--------CACHE_BODY--------'."\n".serialize($result)."\n".'--------CACHE_EXPIRY--------'."\n".mt_rand($this->min_cache, $this->max_cache)."\n=========================\n\n\n\n", FILE_APPEND);

				try {
				Cache::put($cache_key, serialize($result), mt_rand($this->min_cache, $this->max_cache));
			} catch (Exception $e){
				var_dump(array($cache_key));
				var_dump($result); exit();
				var_dump($e);
				exit();
			}

			endif;

		endif;

		return $result;
    
    }

    private function _limit_key_size($cache_key)
    {

    	if (mb_strlen($cache_key, 'UTF-8') > 250):

			$cache_key = substr(md5($cache_key), 0, 250);
		
		endif;

		return $cache_key;
    }
} 
