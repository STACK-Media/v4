<?php 

namespace App\Services;

use App\Services\Cacheturbator as Cacher;

class Check301 extends Service
{

	var $page_services = array(
			'SportController',
			'TaxonomyController',
			'MarketingController',
			'ContentController'
		),
		$verticals = array();

	function __construct()
	{
		parent::__construct();

		app()->configure('verticals');

		$this->verticals = config('verticals');

	}

	function check($path = NULL){

		$params  = explode('/', $path);
		$subsite = '';

		if (isset($params[0]) && array_key_exists($params[0], $this->verticals)):

			$subsite = $params[0];
			unset($params[0]);

			$params = array_values($params);

		endif;

		foreach ($this->page_services as $service_name):

			$class   = 'App\Http\Controllers\\'.$service_name;
			$service = new $class;

			if ( ! is_callable(array($service, 'is_valid_page_path'))):

				continue;

			endif;

			$route = $service->is_valid_page_path($params);

			if ($route !== FALSE && is_array($route) && isset($route['routename'])):

				if ($subsite):
					
					$route['routename'] = $subsite . $route['routename'];

				endif;

				return $route;

			endif;

		endforeach;

		return FALSE;
	}

}