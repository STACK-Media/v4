<?php 

namespace App\Services\WidgetServices;

class Hero extends WidgetService
{
	function get($page_object)
	{
		// grab hero array
		$hero 		= array(
			'title'	=> 'Get Started Today',
			'img'	=> '/assets/img/widgets/hero/patrick-willis.jpg',
			'url'	=> '/train-like-a-pro/'
		);

		return array(
			'hero'	=> $hero
		);
	}

}