<?php

namespace ESP\SailThru;

class Events
{
	public function __construct()
	{
		// initialize Sailthru Platform
		$this->Platform 	= new \ESP\SailThru\Platform;

		// set method this class will use to connect to SailThru
		$this->_method 		= 'event';
	}

	public function Send($email,$event,$value='')
	{
		// create data array
		$data 		= array(
			'event'	=> $event,
			'id'	=> $email,
			'vars'	=> array(
				'value'	=> $value
			)
		);

		// start job
		return $this->Platform->API($this->_method,$data);
	}
}