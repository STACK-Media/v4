<?php 

namespace App\Services\ESPManagers\SailThru;

class Subscription extends SailThru
{
	var $_method	= 'email';

	public function __construct()
	{
		// do something
	}

	public function Create($email,$vars=array(),$lists=array('Master' => 1))
	{
		// create data array
		$data 		= array(
			'email' 	=> $email,
			'vars'		=> $vars, 
			'lists'		=> $lists,
		);

		// add subscriber
		return SailThru::API($this->_method,$data);
	}

	public function Get($email)
	{
		// create data array
		$data 		= array(
			'email'		=> $email
		);

		// get data
		return SailThru::API($this->_method,$data);
	}

	public function Update($email,$vars=array(),$lists=array())
	{
		return self::Create($email,$vars,$lists);
	}

	public function Unsubscribe()
	{

	}
}