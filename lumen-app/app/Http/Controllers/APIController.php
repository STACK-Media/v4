<?php 

namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;

use App\Services;

class APIController extends BaseController
{

    function index($service,$class,$method)
    {
    	if ( ! $service || ! $class || ! $method):

    		return FALSE;

    	endif;

    	// verify service exists

    	// verify class exists

    	// verify method exists

    	// set service object
    	$Service 	= $this->$service($class);

    	// run service::class::method()
    	$response 	= $Service->$method();

    	// return response
        return ;
    }

    private function Contentmanager($class)
    {
    	return new Services\Contentmanager($class);
    }

    private function ESPManager($class)
    {
    	return new Services\ESPManager($class);
    }

    private function Videomanager($class)
    {
    	return new Services\Videomanager($class);
    }
} 
