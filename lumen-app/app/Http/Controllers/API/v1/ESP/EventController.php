<?php

namespace App\Http\Controllers\API\v1\ESP;

use App\Http\Controllers\API\v1\ESP\ESPController;
use App\Services\ESPManager;
use Illuminate\Http\Request;

class EventController extends ESPController {

	public function __construct()
	{
		$this->event 	= new ESPManager('event');
	}

	/* POST: create new */
	public function trigger(Request $http)
	{
		// initialize parameters
		$params 	= $http->all();
		$email 		= $params['email'];
		$event 		= $params['event'];
		$value 		= $params['value'];

		// send event
		return $this->format($this->event->Send($email,$event,$value));
	}
}