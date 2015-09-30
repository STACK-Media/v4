<?php namespace App\Http\Controllers;

use App\Services\TaxonomyPage;

class TaxonomyController extends PageController
{

    function index($type = 'category', $slug = NULL)
    {

        $page_data = array();

        $this->_set_page_object($this->_initiate_service($type, $slug));

        //$page_data['widgets'] = $this->_get_widgets($type);
        
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

    function _initiate_service($type, $slug)
    {
        return new TaxonomyPage(array(
            'type'            => $type,
            'identifier'      => $slug,
            'identifier_type' => 'slug'
        ));
    }

    function is_valid_page_path($params)
    {

        if ( ! is_array($params) || ! $params || ! isset($params[0])):

            return FALSE;

        endif;

        $slug = strtolower($params[0]);

        $page = $this->_initiate_service('post_tag', $slug);       

        if ( ! $page || ! is_object($page) || ! @$page->id):

            return FALSE;

        endif;

        return array(
            'routename' => 'tag',
            'params' => array(
                'slug' => $slug
            )  
        );
    }
}
