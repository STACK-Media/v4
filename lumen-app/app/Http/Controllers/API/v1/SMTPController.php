<?php

namespace App\Http\Controllers\API\v1;

class SMTPController extends APIController 
{

	public function send()
	{
		// initialize variables
		//$params 	= $http->all();

		\Mail::raw('thompson2091@gmail.com', function($msg) { $msg->to(['thompson2091@gmail.com']); $msg->from(['matt.thompson@stack.com']); });

		echo 'hi';
	}

}