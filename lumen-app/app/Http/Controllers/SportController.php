<?php namespace App\Http\Controllers;

use App\Services\SportPage;

class SportController extends PageController
{

    function index($slug = NULL)
    {
    	$page_data = array();
    	
		$this->_set_page_object(new SportPage(array(
			'sport'		=> $slug
		)));

    	//$page_data['widgets'] = $this->_get_widgets('sport');

    	return $this->_load_page_view('sport', $page_data);
    }
} 
