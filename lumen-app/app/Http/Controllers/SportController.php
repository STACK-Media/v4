<?php namespace App\Http\Controllers;

class SportController extends PageController
{

    function index($slug = NULL)
    {
    	return view('theme::layouts.sport');
    }
} 
