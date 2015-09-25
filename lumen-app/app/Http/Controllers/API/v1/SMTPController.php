<?php

namespace App\Http\Controllers\API\v1;


class SMTPController extends APIController 
{

	public function send(Request $http)
	{
		// initialize variables
		$params 	= $http->all();

		echo 'hi';
	}

}