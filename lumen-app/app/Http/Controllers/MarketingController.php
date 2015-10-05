<?php 
namespace App\Http\Controllers;

use App\Services\MarketingPage;

class MarketingController extends PageController
{

    function index($slug, $player, $playlist, $video)
    {
    	$page_data = array();
    	
		$this->_set_page_object($this->_initiate_service($slug, $player, $playlist, $video));

    	return $this->_load_page_view('marketing.'.$slug, array());
    }

    function _initiate_service($slug, $player, $playlist, $video)
    {
        return new MarketingPage(array(
			'slug'		=> $slug,
			'player'	=> $player,
			'playlist'	=> $playlist,
			'video'		=> $video
		));
    }

    function is_valid_page_path($params)
    {

        if ( ! is_array($params) || ! $params || ! isset($params[0])):

            return FALSE;

        endif;

        if ($params[0] !== 'STACK'):

        	return FALSE;

        endif;

        $slug      = $params[1];
        $player    = $params[2];
        $playlist  = $params[3];
        $video     = $params[4];
        
        $marketing = $this->_initiate_service($slug, $player, $playlist, $video);
  
        if ( ! $marketing || ! is_object($marketing) || ! @$marketing->id):

            return FALSE;

        endif;

        return array(
            'routename' => 'marketing',
            'params'    => array(
                'slug'     => $slug,
                'player'   => $player,
                'playlist' => $playlist,
                'video'    => $video
            )  
        );
        
    }
} 
