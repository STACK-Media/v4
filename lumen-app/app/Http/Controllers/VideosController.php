<?php

namespace App\Http\Controllers;

use App\Services\VideosPage;
use App\Services\Videomanager;

class VideosController extends PageController
{
	// default playlist id to play on this page
    ## TODO: Move to config
	var $playlist 	= array(
       'default'                => '3439059561001',
       '4w'                     => '3439059561001',
       'gamer'                  => '3439059561001',
       'basic-training'         => '3439059561001',
       'coaches-and-trainers'   => '3439059561001',
       'fitness'                => '3439059561001',
       'gear'                   => '3439059561001'
    );	// TODO: move to config
	
	// featured videos playlist id's
    ## TODO: Move to config
	var $featured 	= array(
		'3468569377001',
		'2816772539001',
		'3468569373001',
		'2519109400001',
		'2538396212001',
		'3468569375001',
		'2480354524001',
		'3328697758001',
		'1553564660001',
		'3328697710001',
		'829197147001',
		'829963816001'
	);

    function index()
    {
        // initialize variables
        $data  = array();

        // grab playlist id we need to use (based on vertical)
        $id    = (isset($this->playlist[$this->_subtheme]))? $this->playlist[$this->_subtheme]: $this->playlist['default'];     

    	// set page object
        $this->_set_page_object(new VideosPage(array(
        	'id'	    => $id,
            'featured'  => $this->featured
        )));

        // load page
    	return $this->_load_page_view('videos', $data);
    }
} 
