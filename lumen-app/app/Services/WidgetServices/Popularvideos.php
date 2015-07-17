<?php 

namespace App\Services\WidgetServices;

use App\Services\Videomanager;

class Popularvideos extends WidgetService
{
	function get($page_object)
	{
		$playlist 	= new Videomanager('playlist');

		// for now, we hard code the playlist
		$id 		= '4131748614001';

		return $playlist->get($id); // need to add some arguments
	}

}