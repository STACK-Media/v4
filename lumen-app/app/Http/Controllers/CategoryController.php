<?php namespace App\Http\Controllers;

class CategoryController extends Controller
{

    function index($id, $slug = NULL)
    {
    	return view('theme::layouts.category');
    }
} 
