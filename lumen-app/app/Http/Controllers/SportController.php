<?php namespace App\Http\Controllers;

class SportController extends Controller
{

    function index($slug = NULL)
    {
    	return view('theme::layouts.sport');
    }
} 
