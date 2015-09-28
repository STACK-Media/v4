<?php 
namespace App\Http\Controllers;

use App\Services\CustomPage;
use App\Services\Contentmanager;
use Request;

class CustomController extends PageController
{
	private function index($slug,$data=array())
	{    	
    	// set page object
		$this->_set_page_object(new CustomPage(array(
			'slug'	=> $slug
		)));

		return $this->_load_page_view('custom.'.$slug, $data);
	}

    private function redirect($url,$code=301)
    {
        echo redirect()->to($url,301);
    }

    public function atoz()
    {
		// initialize needed services
		$taxonomy 			= new Contentmanager('taxonomy');

		// grab all categories and tags
		$taxonomies			= $taxonomy->all();

		// set data variables
		$data['taxonomies']	= $taxonomies;
		
        return $this->index('a-to-z', $data);
    }

    public function beast()
    {
        return $this->index('stack-beast');
    }

    public function contact()
    {
        return $this->index('contact');  
    }

    public function terms()
    {
    	return $this->index('terms-of-use');	
    }

    public function velocity()
    {
    	return $this->index('stack-velocity');	
    }

    public function originals()
    {
        // initialize config
        app()->configure('stack-originals');

        // grab stack-originals config values
        $data   = config('stack-originals');

        // show page
        return $this->index('stack-originals',$data);  
    }

    public function vsptrial()
    {
        // redirect 
        $this->redirect('http://www.velocitysp.com/free_trial',302);
    }

    public function resources()
    {
        return $this->index('resources');
    }

}