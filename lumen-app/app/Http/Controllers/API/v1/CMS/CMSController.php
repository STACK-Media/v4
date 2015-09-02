<?php
namespace App\Http\Controllers\API\v1\CMS;

use App\Http\Controllers\API\v1\APIController;

class CMSController extends APIController 
{
	public function __construct()
	{

	}

	public function format($result)
	{
		// was lead insertion successful?
		$success 	= ( ! is_array($result) AND ! is_object($result))? FALSE: TRUE;

		// return API response
		return $this->response($success,$result);
	}
}