<?php 

namespace App\Services\Contentmanagers\Wordpress;

use App\Services\Cacheturbator as Cacher;

use App\Services\Contentmanagers\Wordpress\Article;
use App\Services\Videomanager;

class Navigation extends Wordpress
{

	private $_nav;

	function __construct()
	{
		parent::__construct();

		app()->configure('navigation');
		app()->configure('verticals');

		// set default nav
		$this->_nav 		= config('navigation');
		$this->_verticals 	= config('verticals');
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

	function _get_nav_content_taxonomy($args, $page_data) 
	{
		$articleservice = new Article;

		// get count
		$id 		= (isset($args['id']))? $args['id']: FALSE;
		$count 		= (isset($args['count']))? $args['count']: 3;
		$vertical 	= (isset($args['vertical']) AND isset($this->_verticals[$args['vertical']]))? $this->_verticals[$args['vertical']]: FALSE;

		// if no id is passed, then just return empty array of articles
		if ( ! $id)
			return array('articles' => array());

		// if vertical is used, then grab articles by category & vertical
		$articles 	= ($vertical)? $articleservice->get_by_category_vertical($id,$vertical,$count): $articleservice->get_by_category_id($id, $count);

		// error handling
		if ( ! is_array($articles))
			$articles  	= array();

		// return the articles
		return array('articles' => $articles);
	}

	function _get_nav_content_video($args, $page_data) 
	{
		// intiialize classes
		$manager 	= new Videomanager('video');
		
		// initialize variables
		$videos 	= array();
		$count 		= (isset($args['count']))? $args['count']: 3;	// default to 3 videos
		
		// if no id is passed, then grab all
		if ( ! isset($args['all']))
			$args['all']	= array('');

		// set params
		$params 	= array(
			'all'			=> $args['all'],
			'page_size'		=> $count
		);

		// grab videos from brightcove
		$videos 	= $manager->search($params);

		// error handling
		$videos 	= (isset($videos['videos']))? $videos['videos']: array();

		// return videos
		return array('videos' => $videos);
	}


	// function _get_nav_content_vertical($args, $page_data) {}
	// function _get_nav_content_static($args, $page_data) {}
	// function _get_nav_content_sport($args, $page_data) {}
	// function _get_nav_content_page($args, $page_data) {}
	// function _get_nav_content_tag($args, $page_data) {}

}