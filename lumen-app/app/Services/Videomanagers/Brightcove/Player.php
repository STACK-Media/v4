<?php 

namespace App\Services\Videomanagers\Brightcove;

class Player extends Brightcove
{
	function get()
	{
		return array(
			'player_name' => 'brightcove',
			'video_data'  => array(
				'player_id'   => '3813396932001',
				'player_key'  => 'AQ~~,AAAAAEBVkPU~,71bz9Fa_E4NJd1TE6TnJJvxnbF0gLLRt',
				'video_id'    => '3815310684001'
			)
		);
	}
}