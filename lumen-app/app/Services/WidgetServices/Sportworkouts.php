<?php 

namespace App\Services\WidgetServices;

class Sportworkouts extends WidgetService
{
	function get($page)
	{
		// intiialize method
		$method 	= '_'.$page->sport;

		// grab sport data from config
		$sport 		= $this->$method();

		return array(
			'sport'		=> $sport
		);
	}

	private function _football()
	{
		return array(
			'title' 	=> 'Pro Football',
			'articles'	=> array(
				array(
					'id'	=> 1,
					'name'	=> 'Peyton Manning',
					'img'	=> 'http://www.stack.com/img/pro/football/peyton.jpg',
					'slug'	=> 'peyton-mannings-training-routine' 
				),
				array(
					'id'	=> 2,
					'name'	=> 'Drew Brees',
					'img'	=> 'http://www.stack.com/img/pro/football/brees.jpg',
					'slug'	=> 'drew-brees-off-season-training-plan' 
				),
				array(
					'id'	=> 3,
					'name'	=> 'Robert Griffin III',
					'img'	=> 'http://www.stack.com/img/pro/football/RGIII.jpg',
					'slug'	=> 'rgiii-workout' 
				),
			)
		);
	}
}