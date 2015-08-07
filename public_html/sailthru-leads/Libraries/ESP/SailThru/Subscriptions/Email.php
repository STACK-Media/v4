<?php

namespace ESP\Sailthru\Subscriptions;

class Email
{
	var $Platform;

	public function __construct()
	{
		// initialize Sailthru Platform
		$this->Platform 	= new \ESP\SailThru\Platform;

		// set method this class will use to connect to SailThru
		$this->_method 		= 'email';
	}

	public function Exists($email)
	{
		/*
		$data 		= array(
			'id'		=> $email,
			'key'		=> 'email',
			'lists'		=> array(
				'Master'	=> 1
			)
		);
		*/

		return isset($_COOKIE['_stack_lead']);//$this->Platform->API('user',$data);
	}

	public function Create($email,$lists=array('Newsletter' => 1),$vars=array())
	{
		// create data array
		$data 		= array(
			'email' 	=> $email, 
			'lists'		=> $lists,
			'vars'		=> $vars
		);

		// set cookie that lead was created
		setcookie('_stack_lead', $email, time() + (86400 * 30), "/");

		// add subscriber
		return $this->Platform->API($this->_method,$data);
	}

	public function Get($email)
	{
		// create data array
		$data 		= array(
			'email'		=> $email
		);

		// get data
		return $this->Platform->API($this->_method,$data);
	}

	public function Purchase($email, $message_id, $items)
	{

		$data = array(
			'email'      => $email,
			'message_id' => $message_id,
			'items'      => $items,
			// 'send_template' => ''
		);

		return $this->Platform->API('purchase',$data);

	}

	public function Update()
	{

	}

	public function Delete()
	{

	}
}