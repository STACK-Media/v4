<?php namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;

class PageController extends BaseController
{
	protected 
		$_theme       = 'stack', 
		$_subtheme    = '4w',
		$_page_object = NULL;


	/**
	 * Loads a given layout with given page data.
	 * Adds the current page object to the page data.
	 * Called within child controllers.
	 * @param  string : name of layout view file to load
	 * @param  array : all page data to pass to view
	 * @return string : html output
	 */
	protected function _load_layout($layout, $page_data = array())
	{

		$page_data['page'] = $this->_page_object;

		return view('theme::layouts.'.$layout, $page_data);
	}

    public function __construct()
	{
		// set view folder heirarchy
		$this->_set_view_folders($this->_theme, $this->_subtheme);			
	
		// define layout to use 
		
		// define global variable(s)

		// grab widgets
	}

	private function _set_view_folders($theme, $subtheme = FALSE)
	{

		if ( ! $theme):

			// gotta have a theme yo
			throw new Exception('Theme folder not provided');

		endif;

		$view_folder = base_path().'/resources/views';

		// top-level theme paths
		// cascade back to global folder
		$namespace   = array(
			$view_folder . '/themes/'.$theme,
			$view_folder . '/global'
		);

		if ($subtheme):

			// add subtheme folder to theme namespace if provided
			// will cascade back to theme, then global
			array_unshift($namespace, $view_folder . '/themes/'.$theme.'/subthemes/'.$subtheme);

		endif;

		// create theme namespace
		view()->addNameSpace('theme', $namespace);

	}
}
