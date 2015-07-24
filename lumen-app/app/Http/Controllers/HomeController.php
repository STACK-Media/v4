<?php 
namespace App\Http\Controllers;

use App\Services\HomePage;

class HomeController extends PageController
{

    function index()
    {
    	/*
		$this->_set_page_object(new HomePage(), array(
			'id'	=> '123'
		));
		*/
		
		$this->_object = new \stdClass();
		$this->_object->id = '123';

    	$page_data['widgets'] = $this->_get_widgets('homepage');

    	return $this->_load_page_view('home', $page_data);
    }
} 
