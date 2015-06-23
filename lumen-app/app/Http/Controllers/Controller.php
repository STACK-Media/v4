<?php namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;

class Controller extends BaseController
{
	protected 
		$_theme    = 'v4', 
		$_subtheme = '4w';


    public function __construct()
	{
		$this->_set_view_folders($this->_theme, $this->_subtheme);			
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
