<?php 

namespace App\Http\Controllers;

use App\Services\ArticlePage;

class ArticleController extends PageController
{

    function index($slug)
    {

        $status    = 'publish';
        $page_data = array();

        $this->_set_page_object(new ArticlePage(array(
            'slug' => $slug, 
            'type' => $status
        )));

        //$page_data['widgets'] = $this->_get_widgets('article');

        return $this->_load_page_view('article', $page_data);
    }

    /*
    function index($id, $slug = NULL)
    {

    	$status = 'publish';

    	$this->_set_page_object(new ArticlePage(), array(
			'id'   => $id, 
			'type' => 'publish'
		));

    	$page_data['widgets'] = $this->_get_widgets('article');

    	return $this->_load_page_view('article', $page_data);
    }
    */
} 
