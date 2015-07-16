<?php 

namespace App\Services;

class Widgets extends Service
{

	function get_list($page_type = 'article', $page_object = NULL)
	{

		if ($page_type != 'article'):

			return array();

		endif;

		return array(
    		'content' => array(
    			'player',
			/*	'article',
				'author',
				'must-see',
				'zergnet',
				'outbrain' */
    		),
    		'sidebar' => array(
    			/*'featured-videos',
				'newsletter',
				'popular-videos',
				'trending-block',
				'outbrain-sidebar'*/
    		),
    		'post_content' => array(
    			/*'pinterest',
				'recommended'*/
    		)
    	);
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

		throw new \Exception('Widget does not exist.');		
	}

	
} 
