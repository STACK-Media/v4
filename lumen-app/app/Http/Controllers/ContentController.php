<?php 

namespace App\Http\Controllers;

use App\Services\ContentPage;

class ContentController extends PageController
{

    function index($slug)
    {
        $status = 'publish';

        $this->_set_page_object(new ContentPage(array(
            'slug'  => $slug, 
            'type'  => $status,
            'page'  => 'article'
        )));

        //$page_data['widgets'] = $this->_get_widgets('article');

        return $this->_load_page_view('article', array());
    }

    public function page($slug)
    {
        $status = 'publish';

        $this->_set_page_object(new ContentPage(array(
            'slug'  => $slug, 
            'type'  => $status,
            'page'  => 'page'
        )));

        //$page_data['widgets'] = $this->_get_widgets('page');

        return $this->_load_page_view('page', array());
    }

} 
