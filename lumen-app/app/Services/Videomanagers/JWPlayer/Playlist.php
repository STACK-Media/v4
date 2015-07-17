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
						'id'			=> '123',
						'name'			=> 'Joe Haden\'s Celebrity Softball Game',
						'videoStillURL'	=> 'http://stack-a.akamaihd.net/pd/1079349493/201506/1079349493_4288479753001_Joe-Haden-CSBG-Thumbnail.jpg?pubId=1079349493',
						'playsTotal'	=> '1370'
					),
					array(
						'id'			=> '124',
						'name'			=> 'Joe Mauer\'s On-Field Baseball Skill Development',
						'videoStillURL'	=> 'http://stack-a.akamaihd.net/pd/1079349493/201503/1079349493_4097544563001_complete-vid-1SD-vs.jpg?pubId=1079349493',
						'playsTotal'	=> '647449'
					)
				)
			)
		);
	}
}