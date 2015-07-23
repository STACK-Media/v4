<?php 

namespace App\Services\ESPManagers\SailThru;

class Event extends SailThru
{
	var $_method 	= 'email';

	public function __construct()
	{
		// do something
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
		return SailThru::API($this->_method,$data);
	}
}