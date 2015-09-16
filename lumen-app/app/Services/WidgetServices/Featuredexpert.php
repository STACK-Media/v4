<?php 

namespace App\Services\WidgetServices;

use App\Services\Contentmanager;

class Featuredexpert extends WidgetService
{
	function get($page_object)
	{
		$user 		= new Contentmanager('user');
		$article 	= new Contentmanager('article');
		$meta 		= array();
		$articles 	= array();

		// grab featured author object
		$author 	= $user->get_featured();

		// make sure we were able to grab the featured author
		if (isset($author->ID)):

			// get author meta
			$meta 		= $user->get_meta($author->ID);

			// get author articles
			$articles 	= $article->get_by_user_id($author->ID);

		endif;

		return array(
			'author' 	=> json_decode(json_encode($author),TRUE),
			'meta'		=> json_decode(json_encode($meta),TRUE),
			'articles'	=> json_decode(json_encode($articles),TRUE)
		);
	}
}