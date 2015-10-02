<?php 

namespace App\Services\Videomanagers\Brightcove;

//use App\Services\Videomanagers\Brightcove\Video;

class Playlist extends Brightcove
{

	function get($id, $limit = 10)
	{
		// generate API params
		$params 		= array(
			'playlist_id' 		=> $id, 
			'media_delivery' 	=> 'default'
		);

		// grab playlist by id
		$playlist 	= $this->api('find_playlist_by_id', $params);

		// format (if necessary)

		if (is_array($playlist)):

			if ($limit):

				//$vidservice = new Video;
				$playlist['videoIds'] = array_slice($playlist['videoIds'], 0, $limit, TRUE);
				$playlist['videos']   = array_slice($playlist['videos'], 0, $limit, TRUE);

			endif;

			foreach($playlist['videos'] as $key => $video):

				$playlist['videos'][$key] = $this->format_video($video);

			endforeach;

		endif;

		return $playlist;
	}

	public function multiple($ids=array(),$limit=10)
	{
		// generate API params
		$params 		= array(
			'playlist_ids' 		=> implode(',',$ids), 
			'media_delivery' 	=> 'default'
		);

		// grab playlist by id
		$playlist 	= $this->api('find_playlists_by_ids', $params);
		$playlist 	= (isset($playlist['items'][0]))? $playlist['items'][0]: array();

		// error handling
		if (empty($playlist))
			return array('videos' => array(), 'videoIds' => array());

		// format (if necessary)

		if ($limit):

			//$vidservice = new Video;
			$playlist['videoIds'] = array_slice($playlist['videoIds'], 0, $limit, TRUE);
			$playlist['videos']   = array_slice($playlist['videos'], 0, $limit, TRUE);

		endif;

		foreach($playlist['videos'] as $key => $video):

			$playlist['videos'][$key] = $this->format_video($video);

		endforeach;

		return $playlist;
	}
}