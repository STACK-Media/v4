<?php 

namespace App\Services\Videomanagers\Brightcove;

class Playlist extends Brightcove
{

	function get($id)
	{
		// generate API params
		$params 		= array(
			'command' 			=> 'find_playlist_by_id', 
			'playlist_id' 		=> $id, 
			'media_delivery' 	=> 'default'
		);

		// grab playlist by id
		$playlist 	= Brightcove::API($params);

		// format (if necessary)

		return array(
			'playlist'	=> $playlist
		);
	}
}