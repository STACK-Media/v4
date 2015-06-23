<?php namespace App\Http\Controllers;

class VideoController extends Controller
{
    function index($id, $slug = NULL)
    {
    	return view('theme::layouts.video');
    }
} 
