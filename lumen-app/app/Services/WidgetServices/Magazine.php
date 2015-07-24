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
				'url'		=> '/magazine', //replace with routelink()
				'articles'	=> array(
					array(
						'title'	=> 'Learn How Maya Moore Outworked Her Opponents to Become a WNBA Champion and MVP',
						'url'	=> routelink('article', 'maya-moore-feature')
					),
					array(
						'title'	=> 'The Shooting Drills and Strength Workout That Propelled Maya Moore to WNBA MVP',
						'url'	=> routelink('article', 'maya-moore-workout')
					)
				)
			),
			array(
				'title'		=> '2015 Summer Training Guide - Marcus Mariota',
				'img'		=> '/assets/img/magazine/cover/Marcus-Mariota.jpg',
				'url'		=> '/magazine', //replace with routelink()
				'articles'	=> array(
					array(
						'title'	=> 'How Marcus Mariota\'s Work Ethic Powered his Evolution From High-School Back-Up to NFL Star',
						'url'	=> routelink('article', 'marcus-mariota-feature/')
					),
					array(
						'title'	=> 'Steal Chiefs TE Travis Kelce\'s Swagger &mdash; and Workout &mdash; to Step Up Your Game',
						'url'	=> routelink('article', 'travis-kelce-homecoming')
					),
					array(
						'title'	=> 'From Good to Great: How Hard Work and Good Nutrition Landed Two High School Ballers at their Dream Schools',
						'url'	=> routelink('article', 'stack-velocity-matt-ryan-and-ty-jeromfrom-good-to-great-how-hard-work-and-good-nutrition-landed-two-high-school-ballers-at-their-dream-schools')
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