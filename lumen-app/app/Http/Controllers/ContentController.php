<?php 

namespace App\Http\Controllers;

use App\Services\ContentPage;

class ContentController extends PageController
{

    /* wp post */
    function index($slug)
    {
        $status = 'publish';

        $this->_set_page_object($this->_initiate_service($slug, $status, 'article'));

        //$page_data['widgets'] = $this->_get_widgets('article');

        return $this->_load_page_view('article', array());
    }

    function _initiate_service($slug, $status, $pagetype)
    {
        return new ContentPage(array(
            'slug'  => $slug, 
            'type'  => $status,
            'page'  => $pagetype
        ));
    }

    /* wp page */
    public function page($slug)
    {
        $status = 'publish';

        $this->_set_page_object($this->_initiate_service($slug, $status, 'page'));

        //$page_data['widgets'] = $this->_get_widgets('page');

        return $this->_load_page_view('page', array());
    }


    function is_valid_page_path($params)
    {

        if ( ! is_array($params) || ! $params || ! isset($params[0])):

            return FALSE;

        endif;

        $slug = strtolower($params[0]);

        $redirect = FALSE;
        $checkers = array(
            //'article', 
            'page',
            'article'
        );

        $status = 'publish';

        foreach ($checkers as $contenttype):

            $page = $this->_initiate_service($slug, $status, $contenttype);

            if ( ! $page || ! is_object($page) || ! @$page->id):

                continue;

            endif;

            $redirect = array(
                'routename' => $contenttype,
                'params'    => array(
                    'slug' => $slug
                )  
            );

            break;

        endforeach;
        
        return $redirect;
        
    }

} 
