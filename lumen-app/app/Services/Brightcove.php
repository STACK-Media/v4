<?php 

namespace App\Services\Videoplayers;

use App\Services\Service;

class Brightcove extends Service
{

	function get($page_object)
	{
		return Brightcove::get($page_object);
	}

}