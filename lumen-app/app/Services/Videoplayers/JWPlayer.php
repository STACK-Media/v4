<?php 

namespace App\Services\Videoplayers;

class JWPlayer extends Player
{

	function get()
	{
		return array(
			'player_name' => 'jwplayer',
			'video_data'  => array(
				'player_id'   => 'QTUP9F36',
				'video_id'    => '4dETXPx2'
			)
		);
	}

	public function playlist()
	{
		return array(
			'playlist'	=> array(
				'id'		=> '123',
				'name'		=> 'My Playlist',
				'videos'	=> array(
					array(
						'id'		=> '123',
						'name'		=> 'Video 1',
					),
					array(
						'id'		=> '123',
						'name'		=> 'Video 2',
					)
				)
			)
		);
	}

}