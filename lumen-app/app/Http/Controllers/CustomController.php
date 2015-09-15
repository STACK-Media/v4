<?php 
namespace App\Http\Controllers;

use App\Services\CustomPage;
use App\Services\Contentmanager;

class CustomController extends PageController
{
    function atoz()
    {
    	// initialize variables
    	$data 	= array();
    	
    	// set page object
		$this->_set_page_object(new CustomPage(array(
			'slug'	=> 'a-to-z'
		)));

		// initialize needed services
		$taxonomy 			= new Contentmanager('taxonomy');

		// grab all categories and tags
		$taxonomies			= $taxonomy->all();

		// set data variables
		$data['taxonomies']	= $taxonomies;
		
        return $this->_load_page_view('custom.atoz', $data);
    }

}