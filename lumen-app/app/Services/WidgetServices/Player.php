<?php 

namespace App\Services\WidgetServices;

use App\Services\VideoManager;

class Player extends WidgetService
{

	function get($page_object)
	{
		$player = new Videomanager('player');

		return $player->get(); // need to add some arguments
	}

}