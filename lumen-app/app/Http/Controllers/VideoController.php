<?php

namespace App\Http\Controllers;

use App\Services\VideoPage;

class VideoController extends PageController
{
    function index($id, $slug = NULL)
    {

    	$status = 'publish';

        $this->_set_page_object(new VideoPage(), array(
            'id'   => $id, 
            'slug' => $slug
        ));

        $page_data['widgets'] = $this->_get_widgets('video');

    	return $this->_load_page_view('video', array());
    }
} 
