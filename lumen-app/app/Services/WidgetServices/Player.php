<?php 

namespace App\Services\WidgetServices;

use App\Services\Service;
use App\Services\Videoplayer;

class Player extends Service
{

	function get($page_object)
	{
		$player = new Videoplayer();

		return $player->get($page_object);
	}

}