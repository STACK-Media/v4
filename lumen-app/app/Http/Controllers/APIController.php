<?php 

namespace App\Http\Controllers;

use App\Services;

class APIController extends PageController
{

    function index($manager,$service,$method)
    {
    	// create class string
    	$class 	= 'App\\Services\\'.$manager;

    	// 
    	$this->_manager 	= new $class($service);

    	print "<pre>";
    	print_r($this->_manager);
    	exit;


        $data 	= array(
        	'json'	=> ''
        );

        return $this->_load_page_view('api', $data);
    }

    private function ESPManager($class)
    {
    	$obj 	= new Services\ESPManager($class);

    	return $obj;
    }

    private function Videomanager($class)
    {
    	$obj 	= new Services\Videomanager($class);

    	return $obj;
    }    
}
