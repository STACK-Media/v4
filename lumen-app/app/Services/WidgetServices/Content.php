<?php 

namespace App\Services\WidgetServices;

class Content extends WidgetService
{
	public function get($page)
	{
		return array(
			'content'	=> $page->post_content
		);
	}
}