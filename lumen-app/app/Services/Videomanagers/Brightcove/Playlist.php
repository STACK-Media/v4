<?php 

namespace App\Services\Videomanagers\Brightcove;

class Playlist extends Brightcove
{

	function get($id)
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