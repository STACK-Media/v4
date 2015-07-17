<?php 

namespace App\Services\Videomanagers\JWPlayer;

class Video extends JWPlayer
{
	function get($id)
	{
		return array(
			'player_name' => 'jwplayer',
			'video_data'  => array(
				'player_id'   => 'QTUP9F36',
				'video_id'    => '4dETXPx2'
			)
		);
	}
}