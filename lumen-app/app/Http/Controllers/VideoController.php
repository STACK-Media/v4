<?php

namespace App\Http\Controllers;

use App\Services\VideoPage;

class VideoController extends PageController
{
    function index($id, $slug = NULL)
    {

    	$status = 'publish';

        $args = array(
            'id'   => $id, 
            'slug' => $slug
        );

        $this->_set_page_object(new VideoPage($args));

        if ($this->_page_object->slug != $slug):

            $args['slug'] = $this->_page_object->slug;

            return redirect()->route('video', $args);

        endif;

        $page_data['widgets'] = $this->_get_widgets('video');

    	return $this->_load_page_view('video', array());
    }
} 
