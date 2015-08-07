<?php 

namespace App\Services\WidgetServices;

use App\Services;

class Relatedlinks extends WidgetService
{
	 var $page;

	function get($page)
	{
		// set global page variable
		$this->page 	= $page;

		// grab related links
		$videos 		= $this->_get_video_links();
		$categories 	= $this->_get_category_links();
		$tags 			= $this->_get_tag_links();

		return array(
			'links'			=> array(
				'video'		=> $videos,
				'category'	=> $categories,
				'tag'		=> $tags 
			),
			//'category'		=> $category,
		);

	}

	private function _get_video_links()
	{
		// initilaize video manager
		$videos = new Services\VideoManager('video');

		// initialzie variables
		$params 	= array();
		$category 	= array();
		$categories	= (isset($this->page->taxonomy['category']) AND is_array($this->page->taxonomy['category']))? $this->page->taxonomy['category']: array();
		$tags		= (isset($this->page->taxonomy['post_tag']) AND is_array($this->page->taxonomy['post_tag']))? $this->page->taxonomy['post_tag']: array();

		// iterate categories to add to video search parameters
		foreach ($categories AS $key => $value):

			$subcategory 		= (isset($value->name))? $value->name: FALSE;
			$maincategory 		= (isset($value->parent['name']))? $value->parent['name']: $subcategory;

			// if no subcategory, then continue
			if ( ! $maincategory AND ! $subcategory)
				continue;

			// add category to params
			$params['any'][]	= 'maincategory:'.urlencode($maincategory);
			$params['any'][]	= 'subcategory:'.urlencode($subcategory);

		endforeach;

		// iterate tags to add to video request
		// iterate categories to add to video search parameters
		foreach ($tags AS $key => $value):

			// add category to params
			$params['any'][]	= 'tag:'.urlencode($value->name);

		endforeach;

		// set additional params
		$params['page_size']	= 5;
		$params['page_number']	= 0;
		$params['sort_by']		= 'PUBLISH_DATE:DESC';

		// get the videos
		$videos 	= $videos->search($params);

		return $videos['videos'];
	}

	private function _get_category_links()
	{
		// initilaize video manager
		$content 	= new Services\Contentmanager('article');

		// initialzie variables
		$categories	= (isset($this->page->taxonomy['category']) AND is_array($this->page->taxonomy['category']))? $this->page->taxonomy['category']: array();
		$category 	= '';
		$articles 	= array();
		$limit 		= 5;
		$offset 	= 0;

		## TODO: build pagination using the page_number

		// iterate categories to add to video search parameters
		foreach ($categories AS $key => $value):

			// set the category(ies) name
			$category 			= $value->name;

			// grab articles for this category (before the date puslished of current article)
			$articles 			= $content->get_by_category_id($value->term_id,$limit,$offset,$this->page->post_date);

			break;	// break to only show 1 categories' articles

		endforeach;

		return array(
			'articles'		=> json_decode(json_encode($articles),TRUE),
			'name'			=> $category
		);
	}

	private function _get_tag_links()
	{
		// initilaize video manager
		$content 	= new Services\Contentmanager('article');

		// initialzie variables
		$tags		= (isset($this->page->taxonomy['post_tag']) AND is_array($this->page->taxonomy['post_tag']))? $this->page->taxonomy['post_tag']: array();
		$category 	= '';
		$articles 	= array();
		$limit 		= 5;
		$offset 	= 0;

		## TODO: build pagination using the page_number

		// iterate categories to add to video search parameters
		foreach ($tags AS $key => $value):

			// set the category(ies) name
			$tag 				= $value->name;

			// grab articles for this category (before the date puslished of current article)
			$articles 			= $content->get_by_category_id($value->term_id,$limit,$offset,$this->page->post_date);

			break;	// break to only show 1 categories' articles

		endforeach;

		return array(
			'articles'		=> json_decode(json_encode($articles),TRUE),
			'name'			=> $tag
		);
	}
}