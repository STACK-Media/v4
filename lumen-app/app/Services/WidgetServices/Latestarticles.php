<?php 

namespace App\Services\WidgetServices;

use App\Services\Contentmanager;

class Latestarticles extends WidgetService
{
	function get($page)
	{
		// initilaize video manager
		$content 	= new Contentmanager('article');

		// initialzie variables
		$categories	= (isset($page->taxonomy['category']) AND is_array($page->taxonomy['category']))? $page->taxonomy['category']: array();
		$pg_num 	= (isset($page->page_number))? $page->page_number: 0;
		$category 	= array();
		$articles 	= array();
		$limit 		= 5;
		$offset 	= 0;

		## TODO: build pagination using the page_number

		// iterate categories to add to video search parameters
		foreach ($categories AS $key => $value):

			// set the category(ies) name
			$category[] 		= $value->name;

			// grab articles for this category
			$articles 			= $content->get_latest($value->term_id,$limit,$offset);

			break;	// break to only show 1 categories' articles

		endforeach;

		return array(
			'articles'		=> $articles,
			'category'		=> $category
		);
	}
}