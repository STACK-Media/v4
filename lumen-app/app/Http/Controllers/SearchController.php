<?php 
namespace App\Http\Controllers;

use App\Services\SearchPage;

class SearchController extends PageController
{

    function index()
    {
    	$page_data = array();
    	
		$this->_set_page_object(new SearchPage(array(

		)));

    	//$page_data['widgets'] = $this->_get_widgets('search');

    	return $this->_load_page_view('search', $page_data);
    }
} 
