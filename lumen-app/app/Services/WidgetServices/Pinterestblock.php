<?php 

namespace App\Services\WidgetServices;

use App\Services\Contentmanager;

class Pinterestblock extends WidgetService
{
	function get($page)
	{
		// initilaize video manager
		$content 	= new Contentmanager('article');

		// initialzie variables
		$categories	= (isset($page->taxonomy['category']) AND is_array($page->taxonomy['category']))? $page->taxonomy['category']: array();
		$pg_num 	= (isset($page->page_number))? $page->page_number: 0;
		$pinterest 	= array();
		$category 	= array();
		$articles 	= array();
		$limit 		= 20;
		$offset 	= 0;

		## TODO: build pagination using the page_number

		// iterate categories to add to video search parameters
		foreach ($categories AS $key => $value):

			// set the category(ies) name
			$category[] 		= $value->name;

			// grab articles for this category
			$pinterest 			= $content->get_by_category_id($value->term_id,$limit,$offset);

			break;	// break to only show 1 categories' articles

		endforeach;
		

		//$pinterest 	= $content->trending();
		
		// return
		return array(
			'pinterest'	=> json_decode(json_encode($pinterest),TRUE)
		);
	}

}