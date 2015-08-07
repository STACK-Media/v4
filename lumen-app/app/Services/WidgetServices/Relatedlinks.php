<?php 

namespace App\Services\WidgetServices;

use App\Services\Contentmanager;
use App\Services\Videomanager;

class Relatedlinks extends WidgetService
{
	function get($page)
	{
		// grab related links
		$videos 		= $this->_get_video_links();
		$categories 	= $this->_get_category_links();
		$tags 			= $this->_get_tag_links();

		return array(
			'links'			=> array(
				'video'		=> $videos,
				'category'	=> $categories,
				'tag'		=> $tags 
			),
			//'category'		=> $category,
		);

	}

	private function _get_video_links()
	{
		// initilaize video manager
		$videos = new VideoManager('video');

		// initialzie variables
		$params 	= array();
		$categories	= (isset($page->taxonomy['category']) AND is_array($page->taxonomy['category']))? $page->taxonomy['category']: array();
		$category 	= array();

		// iterate categories to add to video search parameters
		foreach ($categories AS $key => $value):

			// add category to params
			$params['any'][]	= 'maincategory:'.urlencode($value->name);
			$params['any'][]	= 'subcategory:'.urlencode($value->name);

			// set the category
			$category[] 		= $value->name;

		endforeach;

		// set additional params
		$params['page_size']	= 5;
		$params['page_number']	= (isset($page->page_number))? $page->page_number: 0;

		// get the videos
		$videos 	= $videos->search($params);

		return $videos;
	}

	private function _get_category_links()
	{
		return array();
	}

	private function _get_tag_links()
	{
		return array();
	}
}