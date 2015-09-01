<?php

namespace App\Http\Controllers\API\v1;

use App\Http\Controllers;
use Laravel\Lumen\Routing\Controller as BaseController;

class APIController extends BaseController {

	public function __construct()
	{

	}

	public function response($success=TRUE,$response=array())
	{
		//http_response_code(200);

		$response  	= array(
			'success'	=> $success,
			'data'		=> $response
		);

		echo json_encode($response);
	}
}