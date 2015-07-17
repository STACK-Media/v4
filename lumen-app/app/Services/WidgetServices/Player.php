<?php 

namespace App\Services\WidgetServices;

use App\Services\Videomanager;

class Player extends WidgetService
{

	function get($page_object)
	{
		$manager = new Videomanager('player');

		return $manager->get(); // need to add some arguments
	}

}