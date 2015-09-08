<?php

namespace App\Http\Controllers\API\v1\ESP;

use App\Http\Controllers\API\v1\ESP\ESPController;
use App\Services\ESPManager;
use Illuminate\Http\Request;

class TemplateController extends ESPController {

	public function __construct()
	{
		$this->template 	= new ESPManager('template');
	}

	/* GET: get single */
	public function send(Request $http)
	{
		// initialize parameters
		$params 	= $http->all();
		$email 		= $params['email'];
		$template 	= $params['template'];

		return $this->format($this->template->Send($email,$template));
	}

}