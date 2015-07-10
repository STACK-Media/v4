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

    	echo $id .' -- ';
    	echo $this->_page_object->id;


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
