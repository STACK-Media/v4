<?php 

namespace App\Services\Videomanagers\Brightcove;

use App\Services\Videomanagers\Manager;

class Brightcove extends Manager
{
	private $_token,
			$_url;

	public function __construct()
	{
		// initialize needed variables
		$this->_token 	= 'aoX9hYmeci2q9OoZOEATo3VVoZ1qz2xTto_59-oAlQw.';//'XkVqsDa4Qs6iCYc4iHyK-qsXDK4J774MWQ8XdP3ApPs.';
		$this->_url 	= 'http://api.brightcove.com/services/library';
	}

	public function api($data=array())
	{
		// initialize variables
		$url 			= $this->_url;

		// add token to POST fields
		$data['token']	= $this->_token;
	
		// generate query string from post_data
		$query_string 	= http_build_query($data);
		
		// always exclude MySTack, donotshow, MarketingPromo
		$query_string 	.= "&none=tag:donotshow&none=tag:MyStack&none=tag:MarketingPromo";

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

		return $response;
	}
}