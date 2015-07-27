<?php 

namespace App\Services\WidgetServices;

use App\Services\Contentmanager;

class Newslinks extends WidgetService
{
	function get($page_object)
	{
		// initialzie the content manager
		$articles 	= new Contentmanager('article');

		// grab latest news articles
		$news 	= $articles->get_by_category_id('683',5);	// 683 = News category

		return array(
			'news'	=> json_decode(json_encode($news),TRUE)
		);
	}

}