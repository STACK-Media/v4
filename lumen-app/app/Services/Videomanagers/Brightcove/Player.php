<?php 

namespace App\Services\Videomanagers\Brightcove;

class Player extends Brightcove
{
	function get($video_id,$playlist_id=FALSE)
	{
		return array(
			'player_name' => 'brightcove',
			'player_data'  => array(
				'account_id'	=> '1079349493',
				'player_id'   	=> 'f43df71d-66fb-42d8-9215-a2c2ee828065', //'abc26517-b7c5-4dd2-8819-f86b3ed9eca2'
				'player_key'  	=> uniqid(),
				'video_id'    	=> $video_id,
				'playlist_id'	=> $playlist_id
			)
		);

		/*
		return array(
			'player_name' => 'brightcove',
			'player_data'  => array(
				'player_id'   => '3813396932001',
				'player_key'  => 'AQ~~,AAAAAEBVkPU~,71bz9Fa_E4NJd1TE6TnJJvxnbF0gLLRt',
				'video_id'    => $video_id
			)
		);
		*/
	}
}