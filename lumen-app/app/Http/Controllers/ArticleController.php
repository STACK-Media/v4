<?php 

namespace App\Http\Controllers;

use App\Services\ArticlePage;
use App\Services\Cacheturbator as Cacher;

class ArticleController extends PageController
{

    function index($id, $slug = NULL)
    {

    	$status = 'publish';

    	$this->_set_page_data(new ArticlePage(), array(
			'id'   => $id, 
			'type' => 'publish'
		));

    	echo $this->_page_object->name;

    	$widgets = array(
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

    	$page_data['widgets'] = $widgets;

    	return $this->_load_page_view('article', $page_data);
    }
} 
