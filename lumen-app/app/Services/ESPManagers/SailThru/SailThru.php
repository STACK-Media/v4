<?php 

namespace App\Services\ESPManagers\SailThru;

use App\Services\ESPManagers\Manager;

class SailThru extends Manager
{
	var $_key 		= '5b542f5e0add3bdac9321209775e66a2',
		$_secret 	= 'e41653ab31961a5fb1d32819cdbf009d',
		$_url 		= 'http://api.sailthru.com/';

	public function __construct($key=FALSE,$secret=FALSE)
	{
		// set new key and secret (if passed)
		if ($key AND $secret):

			$this->_key 	= $key;
			$this->_secret 	= $secret;

		endif;
	}

	public function API($method,$data=array())
	{
		// initialize variables
		$post 				= array();
		$url 				= $this->_url.$method;
	
		// append api_key and api_secret
		$post['api_key']	= $this->_key;
		$post['format']		= 'json';
		$post['json']		= json_encode($data);

		// get api signature
		$post['sig']		= $this->Signature($post);

		// generate query string from post_data
		$query_string 		= http_build_query($post, '', '&');
		
		// initialize curl
		$ch = curl_init();
		
		// set parameters
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $query_string);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_CONNECTTIMEOUT ,0); 
		curl_setopt($ch, CURLOPT_TIMEOUT, 1000); //timeout in seconds		

		// run cUrl
		$response	= curl_exec ($ch);

		curl_close($ch);

		return json_decode($response,TRUE);
	}

	private function Signature($params)
	{
		// Extract parameter values
		$values 	= $this->Extract($params);

		// sort values (alphabetically)
		sort($values,SORT_STRING);

		// set signature
		$signature 	= md5($this->_secret.implode('',$values));

		return $signature;
	}

	private function Extract($params,$values=array())
	{
		// iterate parameters
		foreach ($params AS $key => $value):

			// if value is an array (or object) - recursively run function
			if (is_array($value) OR is_object($value)):

				// recursively run function
				return $this->Extract($value,$values);

			else:

				// if value is a boolean, set ot integer
				if (is_bool($value)):

					$value 	= intval($value);

				endif;

				// add value to values
				$values[] 	= $value;

			endif;

		endforeach;

		// return values
		return $values;
	}
}