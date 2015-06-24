<?php namespace App\Http\Controllers;

class VideoController extends PageController
{
    function index($id, $slug = NULL)
    {
    	return $this->_load_page_view('video', array());
    }
} 
