<?php namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;
use App\Services\Cacheturbator as Cacher;
use App\Services\Widgets;
use App\Services\Promotions;
use App\Services\Contentmanager;
use Request;

class PageController extends BaseController
{
	protected 
		$_theme        = '', 
		$_subtheme     = '',
		$_page_object  = NULL,
		$_view_folder  = NULL,
		$_request_vars = NULL;

    public function __construct()
	{
		
		$this->_theme    = config('theming.theme');
		$this->_subtheme = config('theming.subtheme');

		$this->_request_vars = Request::all();

		$this->_view_folder  = base_path().'/resources/views';

		// set view folder heirarchy
		$this->_set_view_folders($this->_theme, $this->_subtheme);			
	
	}

	public function subtheme($subtheme, $function, $args)
	{

		config(array('theming.subtheme' => $subtheme));

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

		$page_data['page']    = $this->_page_object;
		$page_data['nav']     = $this->_get_nav();
		$page_data['promos']  = $this->_get_promos();
		$page_data['widgets'] = $this->_get_widgets();

		return response(view('theme::'.$page_view, $page_data), 200)->header('Content-type', 'text/html; charset=UTF-8', TRUE);
	}

	protected function _get_promos()
	{

		$promo_service = new Cacher(new Promotions());

		return $promo_service->get_for_page($this->_page_object);

	}

	protected function _get_nav()
	{
		$navservice    = new Contentmanager('navigation');

		return $navservice->get(array(
			'type'     => $this->_page_object->page_type,
			'name'     => $this->_page_object->name,
			'id'       => $this->_page_object->id,
			'subtheme' => config('theming.subtheme'),
			'theme'    => config('theme.theme')
		));
	}


	protected function _set_page_object($class)
	{

		// removed cache stuff from here
		$this->_page_object = $class;

    	$this->_page_object->theme        = $this->_theme;
    	$this->_page_object->subtheme     = $this->_subtheme;
    	$this->_page_object->request_vars = $this->_request_vars;

	}

	protected function _get_widgets()
	{

		$widget_service = new Cacher(new Widgets());

		$widget_config  = $widget_service->get_list($this->_page_object->page_type, $this->_page_object);
print "<pre>";
print_r($widget_config);
		$widget_array   = array();

		foreach ($widget_config AS $position => $widgets):

			foreach ($widgets AS $key => $widget):

				$widget_array[$position][$widget] = $widget_service->get_widget($widget, $this->_page_object);

			endforeach;

		endforeach;
print "<pre>";
print_r($widget_array);
exit;
        return $widget_array;
	}
}
