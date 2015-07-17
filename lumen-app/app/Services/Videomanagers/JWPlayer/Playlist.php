<?php 

namespace App\Services\Videomanagers\JWPlayer;

class Playlist extends JWPlayer
{

	function get($id)
	{
		return array(
			'playlist'	=> array(
				'id'		=> '123',
				'name'		=> 'My JWPlayer Playlist',
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