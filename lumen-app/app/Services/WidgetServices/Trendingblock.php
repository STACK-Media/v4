<?php 

namespace App\Services\WidgetServices;

use App\Services\Contentmanager;

class Trendingblock extends WidgetService
{
	function get($page_object)
	{
		$article 	= new Contentmanager('article');

		// grab trending
		$trending 	= $article->trending();

		// return
		return array(
			'trending'	=> json_decode(json_encode($trending),TRUE)
		);
	}

}