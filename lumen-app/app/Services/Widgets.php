<?php 

namespace App\Services;

class Widgets extends Service
{

	function get_list($page_type = 'article', $page_object = NULL)
	{

		return array(
    		'content' => array(
    			/*
    			'player',
				'author',
				'must-see',
				*/
				'zergnet',
				'outbrain'
    		),
    		'sidebar' => array(
    			'featured-videos',
				/*
				'newsletter',
				*/
				'popular-videos',
				'social-connect',
				/*
				'trending-block',
				'outbrain-sidebar'
				*/
    		),
    		'post_content' => array(

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

		throw new \Exception('Widget '.$class.' does not exist.');		
	}

	
} 
