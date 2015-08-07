<?php namespace App\Http\Controllers;

use App\Services\TaxonomyPage;

class TaxonomyController extends PageController
{

    function index($type = 'category', $slug = NULL)
    {

        $this->_set_page_object(new TaxonomyPage(array(
            'type'            => $type,
            'identifier'      => $slug,
            'identifier_type' => 'slug'
        )));

        $page_data['widgets'] = $this->_get_widgets($type);
        
    	return $this->_load_page_view('category', $page_data);
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
