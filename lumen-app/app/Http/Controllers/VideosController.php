<?php

namespace App\Http\Controllers;

use App\Services\VideosPage;
use App\Services\Videomanager;

class VideosController extends PageController
{
	// default playlist id to play on this page
	var $playlist 	= '3439059561001';	// TODO: this will need to be updated to pull proper playlist per vertical
	
	// featured videos playlist id's
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
    	// initialize classes
    	$manager 	= new Videomanager('playlist');

    	// grab videos from playlist
    	$playlist 	= $manager->get($this->playlist);
    	$featured 	= $manager->multiple($this->featured);

    	// set $id as the first video in series (to set in our page object)
    	$id 		= $playlist['videoIds'][0];

    	// set page object
        $this->_set_page_object(new VideosPage(array(
        	'id'	=> $id
        )));

        // initialize data
        $data 		= array(
        	'playlist'	=> $playlist['videos'],
        	'featured'	=> $featured['videos']
        );

        // load page
    	return $this->_load_page_view('videos', $data);
    }
} 
