<?php

namespace App\Http\Controllers\API\v1;

use Illuminate\Http\Request;

class SMTPController extends APIController 
{
	var $smtp 	= array(
		'from'	=> array(
			'email@stack.com'
		)	
	);

	/*
		$params 	= array(
			'template'	=> 'powerade',
			'subject'	=> 'New Powerade Signup',
			'to'		=> array(
				'thompson2091@gmail.com',
				'travis.loudin@stack.com'
			),
			'params'	=> array(
				'name'			=> 'Matt',
				'interested'	=> 'Yes',
				'beast'			=> 'Yes'
			)
		);
	*/

	public function send(Request $http)
	{
		// initialize variables
		$params 	= $http->all();
		$template 	= (isset($params['template']))? $params['template']: FALSE;

		// error handling
		if ( ! $template)	// TODO: check to verify tempalte exists
			return $this->response(FALSE,'Please pass a valid email template.');

		// error handling
		if ( ! isset($params['to']))
			return $this->response(FALSE,'Please pass a valid to address.');

		// error handling
		if ( ! isset($params['subject']))
			return $this->response(FALSE,'Please pass a valid subject line.');

		// set default parameters
		$params['from']		= (isset($params['from']))? $params['from']: $this->smtp['from'];

		// send the message
		$sent 	= \Mail::send('global.email.'.$template, $params, function($msg) use ($params) { 
			
			// send the message
			$msg->to($params['to'])
				->from($params['from'],'STACK')
				->subject($params['subject']); 
		});

		return $this->response(($sent>0),$params);
	}

}