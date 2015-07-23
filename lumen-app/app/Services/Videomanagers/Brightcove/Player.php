<?php 

namespace App\Services\Videomanagers\Brightcove;

class Player extends Brightcove
{
	function get($video_id = NULL)
	{
		if ( ! $video_id):

			return FALSE;

		endif;

		return array(
			'player_name' => 'brightcove',
			'player_data'  => array(
				'player_id'   => '3813396932001',
				'player_key'  => 'AQ~~,AAAAAEBVkPU~,71bz9Fa_E4NJd1TE6TnJJvxnbF0gLLRt',
				'video_id'    => $video_id
			)
		);
	}
}