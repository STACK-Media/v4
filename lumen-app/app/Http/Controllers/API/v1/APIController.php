<?php

namespace App\Http\Controllers\API\v1;

use App\Http\Controllers;
use Laravel\Lumen\Routing\Controller as BaseController;

class APIController extends BaseController {

	public function response($success=TRUE,$data=array())
	{
		//http_response_code(200);

		echo json_encode(array(
			'success'	=> $success,
			'data'		=> $data
		));
	}
}