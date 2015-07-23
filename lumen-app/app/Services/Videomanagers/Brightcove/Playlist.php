<?php 

namespace App\Services\Videomanagers\Brightcove;

class Playlist extends Brightcove
{

	function get($id, $limit = NULL)
	{
		// generate API params
		$params 		= array(
			'playlist_id' 		=> $id, 
			'media_delivery' 	=> 'default'
		);

		// grab playlist by id
		$playlist 	= Brightcove::api('find_playlist_by_id', $params);

		// format (if necessary)

		if ($limit):

			$playlist['videoIds'] = array_slice($playlist['videoIds'], 0, $limit, TRUE);
			$playlist['videos']   = array_slice($playlist['videos'], 0, $limit, TRUE);

		endif;

		return array(
			'playlist'	=> $playlist
		);
	}
}