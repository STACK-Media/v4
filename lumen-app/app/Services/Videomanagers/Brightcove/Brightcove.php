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

	public function api($command, $data=array(), $return_type = 'json')
	{
		// initialize variables
		$url 			= $this->_url;

		$data['command'] = $command;

		// add token to POST fields
		$data['token']	= $this->_token;

		// generate query string from post_data
		$query_string 	= $this->_build_query($data);

		// always exclude MySTack, donotshow & MarketingPromo
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

		return json_decode($response, ($return_type == 'json'));
	}

	private function _build_query($data)
	{
		// initialize variables
		$query 	= '';

		// iterate the data
		foreach ($data AS $key => $value):

			// if is another array, iterate it
			if (is_array($value)):

				foreach ($value AS $keys => $values):

					// this allow same key to have multiple lines
					//$query 	.= $key.'='.urlencode($values).'&';
					$query 	.= $key.'='.$values.'&';

				endforeach;
			else:

				//$query 	.= $key.'='.urlencode($value).'&';
				$query 	.= $key.'='.$value.'&';

			endif;

		endforeach;

		// remove last &
		$query 	= trim($query,'&');

		return $query;
	}

	function format_video($video)
	{

		if (is_object($video)):

			return $this->_format_video_object($video);

		endif;

		return $this->_format_video_array($video);


	}

	function format_videos($videos)
	{
		$formatted 	= array();

		foreach ($videos AS $video):

			$formatted[]	= $this->format_video($video);

		endforeach;

		return $formatted;
	}

	function _format_video_object($video)
	{
		if ( ! property_exists($video, 'id')):
			
			return $video;
		
		endif;
		
		$video->slug = preg_replace('/[^a-z0-9-]+/', '-', strtolower($video->name));
		$video->link = routelink('video', array('id' => $video->id, 'slug' => $video->slug));

		$remove = array(
			'renditions',
			'FLVFullLength',
			'videoFullLength'
		);

		foreach ($remove as $rem):

			if (property_exists($video, $rem)):

				unset($video->$rem);

			endif;

		endforeach;

		return $video;
	}

	function _format_video_array($video)
	{

		if ( ! isset($video['id'])):
			
			return $video;
		
		endif;

		$video['slug'] = preg_replace('/[^a-z0-9-]+/', '-', strtolower($video['name']));
		$video['link'] = routelink('video', array('id' => $video['id'], 'slug' => $video['slug']));

		$remove = array(
			'renditions',
			'FLVFullLength',
			'videoFullLength'
		);

		foreach ($remove as $rem):

			if (array_key_exists($rem, $video)):

				unset($video[$rem]);

			endif;

		endforeach;

		return $video;

	}
}