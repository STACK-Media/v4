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
				array(
					'id'	=> 4,
					'name'	=> 'Ndamukong Suh',
					'img'	=> 'http://www.stack.com/img/pro/football/suh.jpg',
					'slug'	=> 'ndamukong-suhs-combine-training' 
				),
				array(
					'id'	=> 5,
					'name'	=> 'Cam Newton',
					'img'	=> 'http://www.stack.com/img/pro/football/newton.jpg',
					'slug'	=> 'cam-newton-workout' 
				),
				array(
					'id'	=> 6,
					'name'	=> 'DeSean Jackson',
					'img'	=> 'http://www.stack.com/img/pro/football/jackson.jpg',
					'slug'	=> 'desean-jacksons-fine-tuned-speed-workout' 
				),
				array(
					'id'	=> 7,
					'name'	=> 'NaVarro Bowman',
					'img'	=> 'http://www.stack.com/img/pro/football/bowman.jpg',
					'slug'	=> 'navarro-bowman' 
				),
				array(
					'id'	=> 7,
					'name'	=> 'Patrick Willis',
					'img'	=> 'http://www.stack.com/img/pro/football/willis.jpg',
					'slug'	=> 'get-ripped-with-patrick-willis-workout' 
				),
				array(
					'id'	=> 7,
					'name'	=> 'Patrick Peterson',
					'img'	=> 'http://www.stack.com/img/pro/football/peterson.jpg',
					'slug'	=> 'patrick-peterson-workout' 
				),
				array(
					'id'	=> 8,
					'name'	=> 'Antonio Brown',
					'img'	=> 'http://www.stack.com/img/pro/football/brown.jpg',
					'slug'	=> 'antonio-brown-workout' 
				),
				array(
					'id'	=> 9,
					'name'	=> 'Antonio Gates',
					'img'	=> 'http://www.stack.com/img/pro/football/gates.jpg',
					'slug'	=> 'antonio-gates-strength-training-plan' 
				),
				array(
					'id'	=> 10,
					'name'	=> 'Andrew Luck',
					'img'	=> 'http://www.stack.com/img/pro/football/luck.jpg',
					'slug'	=> 'worlds-greatest-dumbbell-workout' 
				),
				array(
					'id'	=> 11,
					'name'	=> 'Eric Berry',
					'img'	=> 'http://www.stack.com/img/pro/football/berry.jpg',
					'slug'	=> 'eric-berry-agility-training' 
				),
				array(
					'id'	=> 11,
					'name'	=> 'Matthew Stafford',
					'img'	=> 'http://www.stack.com/img/pro/football/stafford.jpg',
					'slug'	=> 'rope-endurance-training-with-matthew-stafford' 
				),
				array(
					'id'	=> 11,
					'name'	=> 'Philip Rivers',
					'img'	=> 'http://www.stack.com/img/pro/football/rivers.jpg',
					'slug'	=> 'off-season-conditioning-and-rehab-with-philip-rivers' 
				),
			)
		);
	}
}