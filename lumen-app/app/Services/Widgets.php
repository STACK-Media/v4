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

		$cfg = config('widgets.'.$page_type);

		if (is_array($cfg)):

			$return = array_merge($return, $cfg);

		endif;

		var_dump($return);

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
