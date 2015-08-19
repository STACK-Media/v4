<?php 

namespace App\Http\Controllers;

class RssController extends PageController
{

    function index()
    {
        $this->_set_page_object(new RssPage(array(
            'feed' => $feed
        )));

        return $this->_load_page_view('rss', $page_data);
    }

} 
