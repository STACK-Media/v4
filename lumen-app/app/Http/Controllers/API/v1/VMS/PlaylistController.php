<?php

namespace App\Http\Controllers\API\v1\VMS;

use App\Http\Controllers\API\v1\VMS\VMSController;
use App\Services\VideoManager;
use Illuminate\Http\Request;

class PlaylistController extends VMSController {

	public function __construct()
	{
		$this->vms 		= new VideoManager('playlist');
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
		$success 	= ( ! isset($result['playlist']))? FALSE: TRUE;

		// set final response
		$response 	= ($success)? $result['playlist']: 'There was an error grabbing playlist information.';

		// return API response
		return $this->response($success,$response);
	}

}