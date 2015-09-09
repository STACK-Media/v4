<?php 

namespace App\Services\WidgetServices;

use App\Services\Videomanager;

class Popularvideos extends WidgetService
{
	function get($page_object)
	{
		$playlist 	= new VideoManager('playlist');

		// for now, we hard code the playlist
		$id 		= '4131748614001';

		return array(
			'playlist'	=> $playlist->get($id, 8)
		);
	}

}