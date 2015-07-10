<?php 

namespace App\Http\Controllers;

use App\Services\Cacheturbator as Cache;

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

    	return $this->_load_page_view('article', $page_data);
    }
} 
