<?php 

namespace App\Services\WidgetServices;

use App\Services\Videomanager;

class Latestvideos extends WidgetService
{
	function get($page)
	{
		// initilaize video manager
		$manager 	= new VideoManager('video');

		// initialzie variables
		$taxonomy 	= $page->name;
		$pgnum		= (isset($page->page_number))? $page->page_number: 0;

		// get the videos
		$videos 	= $manager->latest_by_taxonomy($taxonomy,5,$pgnum);

		// return variables needed
		return array(
			'videos'		=> $videos,
			'category'		=> array($taxonomy)
		);
	}
}