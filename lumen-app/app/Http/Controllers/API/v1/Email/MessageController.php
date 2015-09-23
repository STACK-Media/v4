<?php

namespace App\Http\Controllers\API\v1\Email;

use App\Http\Controllers\API\v1\Email\EmailController;
use App\Services\EmailManager;
use Illuminate\Http\Request;

class MessageController extends EmailController {

	public function __construct()
	{
		$this->message 	= new EmailManager('message');
	}

	public function send(Request $http)
	{
		// initialize parameters
		$params 	= $http->all();
		$to 		= (isset($params['to']))? $params['to']: FALSE;
		$data 		= (isset($params['params']))? $params['params']: array();

		// validation
		if (! $this->_validate($to))
			return $this->format(FALSE,'You must provide a valid email address.');

		// send event
		return $this->format($this->message->send($to,$data),$params);
	}

	private function _validate($email=FALSE)
	{
		// error handling
		if ( ! $email)
			return FALSE;

		return TRUE;
	}
}