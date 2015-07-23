<?php 

namespace App\Services\ESPManagers\SailThru;

class Template extends SailThru
{
	var $_method 	= 'send';

	public function __construct()
	{
		// do something
	}

	public function Email($email,$template)
	{
		// create data array
		$data 		= array(
			'email' 	=> $email, 
			'template'	=> $template
		);

		// add subscriber
		return SailThru::API($this->_method,$data);
	}
}