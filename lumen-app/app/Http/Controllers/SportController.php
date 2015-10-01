<?php namespace App\Http\Controllers;

use App\Services\SportPage;

class SportController extends PageController
{
    var $valid_sports = array(
        'football'
    );

    function index($slug = NULL)
    {
    	$page_data = array();
    
        // if this isn't a valid sport, then lets 
        if ( ! in_array($slug, $this->valid_sports))
          return redirect()->route('tag',array('slug' => $slug));

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
