<?php
namespace App\Http\Controllers\API\v1\ESP;

use App\Http\Controllers\API\v1\APIController;

class ESPController extends APIController 
{
	public function __construct()
	{

	}

	public function format($result)
	{
		// was lead insertion successful?
		$success 	= ( ! isset($result['error']))? TRUE: FALSE;

		// set final response
		$response 	= ( ! isset($result['error']))? $result: $result['errormsg'];

		return $this->response($success,$response);
	}
}