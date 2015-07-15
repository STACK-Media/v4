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

		$func = '_get_widget_'.$widget;

		if (method_exists($this, $func)):

			return $this->$func($page_object);

		endif;

		throw new \Exception('Widget does not exist.');		
	}

	function _get_widget_player($page_object)
	{
		// call Video service here which will call brightcove service
		return array(
			'player_name' => 'brightcove',
			'video_data'  => array(
				'player_id'   => '3813396932001',
				'player_key'  => 'AQ~~,AAAAAEBVkPU~,71bz9Fa_E4NJd1TE6TnJJvxnbF0gLLRt',
				'video_id'    => '3815310684001'
			)
		);

	}

	
} 
