<?php namespace App\Http\Controllers;

class ArticleController extends PageController
{

    function index($id, $slug = NULL)
    {

    	// set dummy widgets
		$page_data['content'] = array(
			'player',
			'article',
			'author',
			'must-see',
			'zergnet',
			'outbrain'
		);

		$page_data['sidebar'] = array(
			'featured-videos',
			'newsletter',
			'popular-videos',
			'trending-block',
			'outbrain-sidebar'
		);

		$page_data['post_content'] = array(
			'pinterest',
			'recommended'
		);


    	return $this->_load_layout('article', $page_data);
    }
} 
