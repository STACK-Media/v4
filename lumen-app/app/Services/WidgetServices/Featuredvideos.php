<?php 

namespace App\Services\WidgetServices;

use App\Services\Videoplayer;

class Featuredvideos extends WidgetService
{

	function get($page_object)
	{
		$player = new Videoplayer();

		return $player->get(); // need to add some arguments
	}

}