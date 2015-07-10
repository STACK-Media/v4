<?php namespace App\Services;

class Widgets extends Service
{

	function get_list($page_type = 'article', $page_object = NULL, $input = NULL)
	{

		if ($page_type != 'article'):

			return array();

		endif;

		return array(
    		'content' => array(
    			'player',
				'article',
				'author',
				'must-see',
				'zergnet',
				'outbrain'
    		),
    		'sidebar' => array(
    			'featured-videos',
				'newsletter',
				'popular-videos',
				'trending-block',
				'outbrain-sidebar'
    		),
    		'post_content' => array(
    			'pinterest',
				'recommended'
    		)
    	);
	}

	
} 
