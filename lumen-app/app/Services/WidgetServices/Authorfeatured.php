<?php 

namespace App\Services\WidgetServices;

use App\Services\Contentmanager;

class Authorfeatured extends WidgetService
{
	function get($page_object)
	{
		$author 	= new Contentmanager('author');

		// grab featured author object
		$featured 	= $author->featured();

		print "<pre>";
		print_r($featured);
		exit;

		return array(
			'featured' => $featured
		);
	}

}