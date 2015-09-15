<?php 

namespace App\Services\Contentmanagers\Wordpress;

use App\Services\Cacheturbator as Cacher;

use App\Services\Contentmanagers\Wordpress\Article;

class Navigation extends Wordpress
{

	private $_nav;

	function __construct()
	{
		parent::__construct();

		app()->configure('navigation');

		// set default nav
		$this->_nav = config('navigation');
	}

	function get($page_data)
	{
		if ( ! is_array($this->_nav))
			$this->_nav 	= array();

		// override navigation for verticals
		app()->configure('navigation-'.$page_data['subtheme']);
		if (is_array(config('navigation-'.$page_data['subtheme'])))
			$this->_nav 	= config('navigation-'.$page_data['subtheme']);

		foreach ($this->_nav as $key => $menu):

			$this->_nav[$key] = $this->_build_nav($menu, $page_data);

		endforeach;

		return $this->_nav;

	}

	function _build_nav($menu, $page_data)
	{

		// need to add routelink

		if (isset($menu['submenu'])):

			foreach ($menu['submenu'] as $skey => $submenu):

				$menu['submenu'][$skey] = $this->_build_nav($submenu, $page_data);

			endforeach;

		endif;

		$func = '_get_nav_content_'.$menu['type'];

		if (method_exists($this,$func)):

			$args = isset($menu['args']) ? $menu['args'] : array();

			$menu['data'] = $this->$func($args, $page_data);

		endif;

		return $menu;

	}

	function _get_nav_content_category($args, $page_data) {

		$articleservice = new Article;

		return array('articles' => $articleservice->get_by_category_id($args['id'], 3));

	}

	function _get_nav_content_videos($args, $page_data) {

	}

	// function _get_nav_content_vertical($args, $page_data) {}
	// function _get_nav_content_static($args, $page_data) {}
	// function _get_nav_content_sport($args, $page_data) {}
	// function _get_nav_content_page($args, $page_data) {}
	// function _get_nav_content_tag($args, $page_data) {}

}