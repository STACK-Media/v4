<?php 

namespace App\Services\WidgetServices;

class Playerright extends Player
{

	function get($page_object)
	{

		$player = parent::get($page_object);

		//$player['playlist'] = new VideoPlaylist();

		return $player;

	}

}