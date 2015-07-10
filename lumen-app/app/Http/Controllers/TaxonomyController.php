<?php namespace App\Http\Controllers;

use App\Services\Taxonomy;
use App\Services\Cacheturbator as Cache;

class TaxonomyController extends PageController
{

    function index($type = 'category', $slug = NULL)
    {

        $this->_page_object = new Cache(new Taxonomy());
    	$this->_page_object->initiate($type, $slug, 'slug');

    	return $this->_load_page_view('category', array());
    }

    function category($slug = NULL)
    {
    	return $this->index('category', $slug);
    }

    function tag($slug = NULL)
    {

    	return $this->index('post_tag', $slug);

    }
}
