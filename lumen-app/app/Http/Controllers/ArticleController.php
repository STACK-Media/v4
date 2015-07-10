<?php 

namespace App\Http\Controllers;

use App\Services\Article;
use App\Services\Cacheturbator as Cacher;

class ArticleController extends PageController
{

    function index($id, $slug = NULL)
    {

    	$status = 'publish';

    	$this->_page_object = new Cacher(new Article());
    	$this->_page_object->initiate($id, 'publish');

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

    	return $this->_load_page_view('article', $widgets);
    }
} 
