<?php namespace App\Http\Controllers;

class ArticleController extends PageController
{

    function index($id, $slug = NULL)
    {
    	return view('theme::layouts.article');
    }
} 
