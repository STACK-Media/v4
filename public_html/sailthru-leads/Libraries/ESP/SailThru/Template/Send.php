<?php

namespace ESP\SailThru\Template;

class Send
{
	var $Platform;

	public function __construct()
	{
		// initialize Sailthru Platform
		$this->Platform 	= new \ESP\SailThru\Platform;

		// set method this class will use to connect to SailThru
		$this->_method 		= 'send';
	}

	public function Email($email,$template)
	{
		// create data array
		$data 		= array(
			'email' 	=> $email, 
			'template'	=> $template
		);

		// add subscriber
		return $this->Platform->API($this->_method,$data);
	}
}