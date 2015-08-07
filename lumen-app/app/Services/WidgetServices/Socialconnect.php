<?php 

namespace App\Services\WidgetServices;

class Socialconnect extends WidgetService
{
	function get($page_object)
	{
		// generate array of social networks w/data
		$social 	= array(
			'facebook'		=> 'https://www.facebook.com/STACK',
			'twitter'		=> 'https://www.twitter.com/stackmedia',
			'youtube'		=> 'https://www.youtube.com/user/STACKVids',
			'instagram'		=> 'https://instagram.com/stackmedia/',
			'google'		=> 'https://plus.google.com/u/0/+STACK/posts',
			'rss'			=> routelink('feed'),
		);

		return array(
			'social'	=> $social
		);
	}

}