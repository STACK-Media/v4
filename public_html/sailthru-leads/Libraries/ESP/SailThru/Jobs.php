<?php

namespace ESP\SailThru;

class Jobs
{
	public function __construct()
	{
		// initialize Sailthru Platform
		$this->Platform 	= new \ESP\SailThru\Platform;

		// set method this class will use to connect to SailThru
		$this->_method 		= 'job';
	}

	public function Start($job,$email,$params=array(),$postback='')
	{
		// create data array
		$data 		= array(
			'job' 			=> $job, 
			'report_email'	=> $email,
			'postback_url'	=> $postback
		);

		// merge data and params into same query
		$data 		= array_merge($data,$params);

		// start job
		return $this->Platform->API($this->_method,$data);
	}

	public function Get($job_id)
	{
		// initialize data
		$data		= array(
			'job_id'	=> $job_id
		);

		// get job
		return $this->Platform->Get($this->_method,$data);
	}
}