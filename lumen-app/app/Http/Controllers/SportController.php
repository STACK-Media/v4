<?php namespace App\Http\Controllers;

use App\Services\SportPage;

class SportController extends PageController
{

    function index($slug = NULL)
    {
    	$page_data = array();
    	
		$this->_set_page_object($this->_initiate_service($slug));

    	//$page_data['widgets'] = $this->_get_widgets('sport');

    	return $this->_load_page_view('sport', $page_data);
    }

    function _initiate_service($sport)
    {
        return new SportPage(array(
            'sport'     => $sport
        ));
    }

    function is_valid_page_path($params)
    {

        if ( ! is_array($params) || ! $params || ! isset($params[0])):

            return FALSE;

        endif;

        $sport = strtolower($params[0]);

        $page  = $this->_initiate_service($sport);       

        if ( ! $page || ! is_object($page) || ! @$page->id):

            return FALSE;

        endif;

        return array(
            'routename' => 'sport',
            'params'    => array(
                'slug' => $sport
            )  
        );
    }
} 
