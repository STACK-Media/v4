<?php 

namespace App\Services\WidgetServices;

use App\Services\Service;

class Content extends Service
{
	public function get($page)
	{
		return array(
			'content'	=> $page->post_content
		);
	}
}