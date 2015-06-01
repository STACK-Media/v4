<?php namespace App\Http\Controllers;

class VideoController extends Controller
{

    function index($video_id, $video_slug = NULL)
    {
    	return view('theme::partials.testing'); 
    } 
}
