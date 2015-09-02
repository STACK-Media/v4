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
	public function show($id,$limit=10)
	{
		// grab lead
		return $this->response(TRUE,'testing');
	}

}