<?php 

namespace App\Services\WidgetServices;

class Newslinks extends WidgetService
{
	function get($page_object)
	{
		// get news
		$news 	= array(
			'articles'	=> array(
				array(
					'title'	=> '"Jurassic World 2" Announced',
					'url'	=> ''
				),
				array(
					'title'	=> 'Professional Surfer Jamie O\'Brien Rides Dangerous Wave On Fire!',
					'url'	=> ''
				),
				array(
					'title'	=> '5-foot-8 Cole Beasley Throws Down Massive Dunk on Instagram',
					'url'	=> ''
				),
				array(
					'title'	=> 'University of Nebraska Reveals "Husker Bold" Alternate Football Uniforms for Homecoming',
					'url'	=> ''
				),
				array(
					'title'	=> 'Watch this Awesome Video from the 2015 American Street Workout Championship',
					'url'	=> ''
				),
				array(
					'title'	=> 'All News',
					'url'	=> ''
				),
			)
		);

		return array(
			'news'	=> $news
		);
	}

}