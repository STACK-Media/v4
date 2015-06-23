<?php namespace App\Http\Controllers;

use DB, App\Models\CategoryModel;

class CategoryController extends Controller
{

    function index($slug = NULL)
    {

    	$category = CategoryModel::get_by_slug($slug);

    	return view('theme::layouts.category');
    }
}
