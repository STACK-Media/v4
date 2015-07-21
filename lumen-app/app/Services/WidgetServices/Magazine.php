<?php 

namespace App\Services\WidgetServices;

class Magazine extends WidgetService
{
	function get($page_object)
	{
		// populate magazines array
		$magazines 		= array(
			array(
				'title'		=> '2015 Summer Training Guide - Maya Moore',
				'img'		=> '/assets/img/magazine/cover/Maya-Moore.jpg',
				'url'		=> 'http://www.stack.com/magazine',
				'articles'	=> array(
					array(
						'title'	=> 'Learn How Maya Moore Outworked Her Opponents to Become a WNBA Champion and MVP',
						'url'	=> 'http://www.stack.com/2015/07/16/maya-moore-feature'
					),
					array(
						'title'	=> 'The Shooting Drills and Strength Workout That Propelled Maya Moore to WNBA MVP',
						'url'	=> 'http://www.stack.com/2015/07/16/maya-moore-workout'
					)
				)
			),
			array(
				'title'		=> '2015 Summer Training Guide - Marcus Mariota',
				'img'		=> '/assets/img/magazine/cover/Marcus-Mariota.jpg',
				'url'		=> 'http://www.stack.com/magazine',
				'articles'	=> array(
					array(
						'title'	=> 'How Marcus Mariota\'s Work Ethic Powered his Evolution From High-School Back-Up to NFL Star',
						'url'	=> 'http://www.stack.com/2015/07/15/marcus-mariota-feature/'
					),
					array(
						'title'	=> 'Steal Chiefs TE Travis Kelce\'s Swagger &mdash; and Workout &mdash; to Step Up Your Game',
						'url'	=> 'http://www.stack.com/2015/07/14/travis-kelce-homecoming'
					),
					array(
						'title'	=> 'From Good to Great: How Hard Work and Good Nutrition Landed Two High School Ballers at their Dream Schools',
						'url'	=> 'http://www.stack.com/2015/07/10/stack-velocity-matt-ryan-and-ty-jeromfrom-good-to-great-how-hard-work-and-good-nutrition-landed-two-high-school-ballers-at-their-dream-schools'
					),
				)
			)
		);

		// grab magazine
		$magazine 		= $magazines[rand(0,count($magazines)-1)];

		return array(
			'magazine'	=> $magazine
		);
	}

}