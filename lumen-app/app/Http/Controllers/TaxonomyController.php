<?php namespace App\Http\Controllers;

use App\Services\TaxonomyPage;
use App\Services\Cacheturbator as Cacher;

class TaxonomyController extends PageController
{

    function index($type = 'category', $slug = NULL)
    {

        $this->_set_page_data(new TaxonomyPage(), array(
            'type'            => $type,
            'identifier'      => $slug,
            'identifier_type' => 'slug'
        ));

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
