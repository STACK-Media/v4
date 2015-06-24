<?php namespace App\Http\Controllers;

use App\Models\Taxonomy;

class TaxonomyController extends Controller
{

    function index($type = 'category', $slug = NULL)
    {

    	$tax_model = new Taxonomy($type, $slug, 'slug');

    	var_dump($tax_model->id);exit();

    	return view('theme::layouts.category');
    }

    function category($slug = NULL)
    {
    	return $this->index('category', $slug);
    }

    function tag($slug = NULL)
    {

    	return $this->index('post_tag', $slug);

    }
}
