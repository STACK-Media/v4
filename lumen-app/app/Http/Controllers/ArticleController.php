<?php namespace App\Http\Controllers;

class ArticleController extends Controller
{

    function index($id, $slug = NULL)
    {
    	return view('theme::partials.testing'); 
    }
} 
