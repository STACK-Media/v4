<?php 
namespace App\Http\Controllers;

use App\Services\ExercisePage;

class ExerciseController extends PageController
{

    function index($id = FALSE)
    {
    	$page_data = array();
    	
		$this->_set_page_object(new ExercisePage(array(
			'id'	=> $id
		)));

    	//$page_data['widgets'] = $this->_get_widgets('magazine');

    	return $this->_load_page_view('exercise', $page_data);
    }
} 