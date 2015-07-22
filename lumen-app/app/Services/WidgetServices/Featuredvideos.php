<?php 

namespace App\Services\WidgetServices;

use App\Services\VideoManager;

class Featuredvideos extends WidgetService
{
	function get($page_object)
	{
		$playlist = new VideoManager('playlist');

		// for now, we hard code the playlist
		$id 	  = '4131748612001';

		return $playlist->get($id, 8); // need to add some arguments
	}

}