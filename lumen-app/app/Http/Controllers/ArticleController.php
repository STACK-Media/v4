<?php namespace App\Http\Controllers;

class ArticleController extends PageController
{

    function index($id, $slug = NULL)
    {
    	return $this->_load_layout('article', array());
    }
} 
