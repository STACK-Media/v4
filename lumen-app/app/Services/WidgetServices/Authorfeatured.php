<?php 

namespace App\Services\WidgetServices;

use App\Services\Contentmanager;

class Authorfeatured extends WidgetService
{
	function get($page_object)
	{
		$user 		= new Contentmanager('user');
		$article 	= new Contentmanager('article');

		// grab featured author object
		$author 	= $user->get_featured();

		// get author meta
		$meta 		= $user->get_meta($author->ID);

		// get author articles
		$articles 	= $article->get_by_user_id($author->ID);

		return array(
			'author' 	=> json_decode(json_encode($author),TRUE),
			'meta'		=> json_decode(json_encode($meta),TRUE),
			'articles'	=> json_decode(json_encode($articles),TRUE)
		);
	}
}