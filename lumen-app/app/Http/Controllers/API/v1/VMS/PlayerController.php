<?php

namespace App\Http\Controllers\API\v1\VMS;

use App\Http\Controllers\API\v1\VMS\VMSController;
use App\Services\VideoManager;
use Illuminate\Http\Request;

class PlayerController extends VMSController {

	public function __construct()
	{
		$this->vms 		= new VideoManager('player');
	}

	/* GET: get single */
	public function show($id)
	{
		// grab lead
		return $this->_format($this->vms->get($id));
	}

	private function _format($result)
	{
		// was lead insertion successful?
		$success 	= (isset($result) AND (is_array($result) OR is_object($result)))? TRUE: FALSE;

		// set final response
		$response 	= ($success)? $result: 'There was an error grabbing player information.';

		// return API response
		return $this->response($success,$response);
	}

}