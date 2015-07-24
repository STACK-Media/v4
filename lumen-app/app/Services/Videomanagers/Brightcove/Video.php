<?php 

namespace App\Services\Videomanagers\Brightcove;

class Video extends Brightcove
{
	function get($video_id = NULL)
	{

		if ( ! $video_id):

			return NULL;

		endif;

		// generate API params
		$params 		= array(
			'video_id'     => $video_id, 
			'video_fields' => 'playsTotal,id,name,thumbnailURL,publishedDate,videoStillURL,shortDescription,longDescription,tags,customFields',

		);

		// grab playlist by id
		$video 	= Brightcove::api('find_video_by_id', $params, 'object');


		return $this->format_video($video);

	}

	
}