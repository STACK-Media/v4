<?php 

namespace App\Services\WidgetServices;

use App\Services\Videomanager;

class Latestvideos extends WidgetService
{
	function get($page)
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

		return array(
			'videos'		=> $videos,
			'category'		=> $category
		);
	}
}