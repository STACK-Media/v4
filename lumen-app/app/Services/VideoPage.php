<?php namespace App\Services;

class VideoPage extends Page
{

	function initiate($args = array())
	{
		$paramlist = array(
			'id'   => NULL, 
			'slug' => NULL
		);
		
		$args      = array_merge($paramlist, $args);
		extract($args);

		$player    = new Videomanager('player');
		$video_key = config('videomanager.article_meta_key');

		$video = $player->get_article_video($id);

		$this->_object = new \stdClass();

		if ($video):

			$this->_object->id    = $id;
			$this->_object->video = $video;

		endif;

		return parent::initiate();
	}


	/*
	function initiate($args = array())
	{

		$paramlist = array(
			'id'   => NULL, 
			'type' => 'publish'
		);
		
		$args      = array_merge($paramlist, $args);
		extract($args);

		$cms = new Contentmanager('article');

		$this->_object = $cms->get_by_id($id, $type);
	}
	*/

	
} 
