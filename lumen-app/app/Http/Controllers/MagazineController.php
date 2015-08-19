<?php 
namespace App\Http\Controllers;

use App\Services\MagazinePage;

class MagazineController extends PageController
{

    function index()
    {
		$this->_set_page_object(new MagazinePage(array(

		)));

    	$page_data['widgets'] = $this->_get_widgets('magazine');

    	return $this->_load_page_view('magazine', $page_data);
    }
} 
