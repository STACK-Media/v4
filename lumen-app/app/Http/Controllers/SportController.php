<?php namespace App\Http\Controllers;

class SportController extends PageController
{

    function index($slug = NULL)
    {

    	return $this->_load_page_view('sport', array());
    }
} 
