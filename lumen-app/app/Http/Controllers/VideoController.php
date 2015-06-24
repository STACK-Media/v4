<?php namespace App\Http\Controllers;

class VideoController extends PageController
{
    function index($id, $slug = NULL)
    {
    	return view('theme::layouts.video');
    }
} 
