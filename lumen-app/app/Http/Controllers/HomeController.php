<?php namespace App\Http\Controllers;

class HomeController extends PageController
{

    function index()
    {
    	return $this->_load_page_view('home', array());
    }
} 
