<?php 
namespace App\Http\Controllers;

use App\Services\HomePage;

class HomeController extends PageController
{

    function index()
    {
    	$page_data = array();
    	
		$this->_set_page_object(new HomePage(array(
			'playlist_id'	=> '618442261001'
		)));

    	//$page_data['widgets'] = $this->_get_widgets('homepage');

    	return $this->_load_page_view('home', $page_data);
    }
} 
