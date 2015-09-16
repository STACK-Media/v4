<?php 

namespace App\Services;

class Widgets extends Service
{

	function __construct()
	{
		parent::__construct();

		app()->configure('widgets');
	}

	function get_list($page_type = 'article', $page_object = NULL)
	{
		$return = array(
			'content'      => array(),
			'sidebar'      => array(),
			'post_content' => array()
		);

		// first attempt to get config from vertical
		$vrt 	= config('widgets.'.$page_object->subtheme.'.'.$page_type);
		$cfg 	= config('widgets.default.'.$page_type);

		// set default config if unable to grab by vertical
		$cfg 	= ( ! is_array($vrt))? $cfg: array_merge($cfg,$vrt);

		if (is_array($cfg)):

			$return = array_merge($return, $cfg);

		endif;

		return $return;
	}

	function get_widget($widget, $page_object = NULL)
	{

		// capitalize class name and remove hyphens, underscores, etc
		$class = ucwords(preg_replace('/[^a-z0-9]/', '', strtolower($widget)));

		$class = 'App\\Services\\WidgetServices\\'.$class;
		
		if (class_exists($class)):

			$class = new $class();

			return $class->get($page_object);

		endif;

		throw new \Exception('Widget '.$class.' does not exist.');		
	}

	
} 
