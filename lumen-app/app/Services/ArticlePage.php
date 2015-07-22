<?php namespace App\Services;

class ArticlePage extends Page
{

	function initiate($args = array())
	{
		$paramlist = array(
			'slug' => NULL, 
			'type' => 'publish'
		);
		
		$args      = array_merge($paramlist, $args);
		extract($args);

		$articlecms    = new Contentmanager('article');
		$this->_object = $articlecms->get_by_slug($slug, $type);


		$player    = new Videomanager('player');
		$video_key = config('videomanager.article_meta_key');

		if (property_exists($this->_object, 'meta') && array_key_exists($video_key, $this->_object->meta)):

			$video_id = $this->_object->meta[$video_key];

			$video  = $player->get_article_video($video_id);

			if ($video):

				$this->_object->video = $video;

			endif;

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
