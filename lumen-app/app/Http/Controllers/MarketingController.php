<?php 
namespace App\Http\Controllers;

use App\Services\MarketingPage;

class MarketingController extends PageController
{

    function index($slug,$player,$playlist,$video)
    {
    	$page_data = array();
    	
		$this->_set_page_object(new MarketingPage(array(
			'slug'		=> $slug,
			'player'	=> $player,
			'playlist'	=> $playlist,
			'video'		=> $video
		)));

    	return $this->_load_page_view('marketing.'.$slug, array());
    }
} 
