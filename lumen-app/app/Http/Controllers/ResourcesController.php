<?php 
namespace App\Http\Controllers;

use App\Services\ResourcesPage;

class ResourcesController extends PageController
{

    function index()
    {
    	$page_data = array();
    	
		$this->_set_page_object(new ResourcesPage(array(

		)));

    	//$page_data['widgets'] = $this->_get_widgets('resources');

    	return $this->_load_page_view('resources', $page_data);
    }
} 
