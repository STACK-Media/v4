<?php 

namespace App\Services\WidgetServices;

use App\Services\Contentmanager;

class Author extends WidgetService
{
	function get($page_object)
	{
		// initilaize content user manager
		$manager 		= new Contentmanager('user');

		// grab author meta
		$meta 		= $manager->get_meta($page_object->author['id']);

		return array(
			'author'	=> $page_object->author,
			'meta'		=> $meta,
			'image'		=> ( ! isset($meta['userphoto_image_file']) ? '' : 'http://blog.stack.com/wp-content/uploads/userphoto/'.$meta['userphoto_image_file']['value'])
		);
	}

}