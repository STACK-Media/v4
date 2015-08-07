<?php 

namespace App\Http\Controllers;

use App\Services\AuthorPage;

class AuthorController extends PageController
{

    function index($slug)
    {

        $status = 'publish';

        $this->_set_page_object(new AuthorPage(array(
            'slug' => $slug, 
            'type' => $status
        )));

        $page_data['widgets'] = $this->_get_widgets('author');

        return $this->_load_page_view('author', $page_data);
    }

} 
