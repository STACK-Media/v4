<?php namespace App\Http\Controllers;

use App\Models\Taxonomy;

class TaxonomyController extends PageController
{

    function index($type = 'category', $slug = NULL)
    {

    	$this->_page_object = new Taxonomy($type, $slug, 'slug');

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
