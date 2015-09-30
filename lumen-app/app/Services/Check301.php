<?php 

namespace App\Services;

use App\Services\Cacheturbator as Cacher;

class Check301 extends Service
{

	var $page_services = array(
		'TaxonomyController'
	);

	function __construct()
	{
		parent::__construct();

	}

	function check($request, $e){

		$path   = \Request::path();
		$params = explode('/', $path);

		foreach ($this->page_services as $service_name):

			$class   = 'App\Http\Controllers\\'.$service_name;
			$service = new $class;

			if ( ! is_callable(array($service, 'is_valid_page_path'))):

				continue;

			endif;

			$route = $service->is_valid_page_path($params);

			if ($route !== FALSE && is_array($route) && isset($route['routename'])):

				return $route;

			endif;

		endforeach;

		return FALSE;
	}

}