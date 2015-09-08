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
		$video 	= $this->api('find_video_by_id', $params, 'object');


		return $this->format_video($video);
	}

	public function search($data=array())
	{	
		// defaut params
		$params 	= array(
			'get_item_count'	=> 'true',
			'sort_by'			=> 'PUBLISH_DATE:DESC',
			'page_size'			=> '10',
			'media_delivery'	=> 'http'
		);

		// merge the arrays
		$params 	= array_merge($params,$data);

		// get the videos
		$videos 	= $this->api('search_videos', $params, 'json');

		return array(
			'videos'		=> $this->format_videos($videos['items']),
			'page_number'	=> $videos['page_number'],
			'page_size'		=> $videos['page_size'],
			'total_count'	=> $videos['total_count']
		);
	}

	public function latest_by_category($category,$limit=5,$page=0)
	{
		// initialzie variables
		$params 				= array();

		// add category to params
		$params['any'][]		= 'maincategory:'.urlencode($category);
		$params['any'][]		= 'subcategory:'.urlencode($category);

		// set additional params
		$params['page_size']	= $limit;
		$params['page_number']	= $page;

		// get the videos
		$videos 				= $this->search($params);

		// return videos
		return (isset($videos['videos']))? $videos['videos']: array();
	}

	
}