<?php

namespace App\Http\Controllers\API\v1\VMS;

use App\Http\Controllers\API\v1\VMS\VMSController;
use App\Services\VideoManager;
use Illuminate\Http\Request;

class VideoController extends VMSController {

	public function __construct()
	{
		$this->vms 		= new VideoManager('video');
	}

	/* GET: get single */
	public function show($id)
	{
		// grab lead
		return $this->response(TRUE,'testing');
	}

}