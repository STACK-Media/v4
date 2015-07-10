<?php namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;
use App\Services\Cacheturbator as Cacher;

class PageController extends BaseController
{
	protected 
		$_theme       = 'v4', 
		$_subtheme    = '',
		$_page_object = NULL,
		$_view_folder = NULL;

    public function __construct()
	{

		$this->_view_folder = base_path().'/resources/views';

		// set view folder heirarchy
		$this->_set_view_folders($this->_theme, $this->_subtheme);			
	
	}

	protected function _set_page_data($class, $args)
	{

		$this->_page_object = new Cacher($class);
    	$this->_page_object->initiate($args);

	}

	public function subtheme($subtheme, $function, $args)
	{

		$this->_subtheme = $subtheme;
		
		view()->prependNameSpace('theme', array($this->_view_folder . '/themes/' . $this->_theme . '/subthemes/' . $subtheme));
		
		return call_user_func_array(array($this, $function), $args);

	}

	private function _set_view_folders($theme, $subtheme = FALSE)
	{

		if ( ! $theme):

			// gotta have a theme yo
			throw new Exception('Theme folder not provided');

		endif;

		// top-level theme paths
		// cascade back to global folder
		$namespace   = array(
			$this->_view_folder . '/themes/'.$theme,
			$this->_view_folder . '/global'
		);

		if ($subtheme):

			// add subtheme folder to theme namespace if provided
			// will cascade back to theme, then global
			array_unshift($namespace, $this->_view_folder . '/themes/' . $theme . '/subthemes/' . $subtheme);

		endif;

		// create theme namespace
		view()->addNameSpace('theme', $namespace);

	}


	/**
	 * Loads a given layout with given page data.
	 * Adds the current page object to the page data.
	 * Called within child controllers.
	 * @param  string : name of layout view file to load
	 * @param  array : all page data to pass to view
	 * @return string : html output
	 */
	protected function _load_page_view($page_view, $page_data = array())
	{

		$page_data['page'] = $this->_page_object;

		return view('theme::'.$page_view, $page_data);
	}
}
