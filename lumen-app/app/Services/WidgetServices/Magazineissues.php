<?php 

namespace App\Services\WidgetServices;

class Magazineissues extends WidgetService
{
	function get($page)
	{
		// grab all issues of magazine
		$issues 	= array(
			array(
				'id'	=> '1',
				'name'	=> 'Summer 2015: Maya Moore',
				'image'	=> 'http://blog.stack.com/wp-content/uploads/2015/07/Maya-Moore.jpg',
				'slug'	=> 'moore-summer-2015'
			),
			array(
				'id'	=> '2',
				'name'	=> 'Summer 2015: Marcus Mariota',
				'image'	=> 'http://blog.stack.com/wp-content/uploads/2015/07/Marcus-Mariota.jpg',
				'slug'	=> 'mariota-summer-2015'
			),
			array(
				'id'	=> '3',
				'name'	=> 'Spring 2015: Abby Wambach',
				'image'	=> 'http://blog.stack.com/wp-content/uploads/2015/05/Screen-Shot-2015-05-21-at-11.23.02-AM.png',
				'slug'	=> 'wambach-spring2015'
			)
		);

		return array(
			'issues'	=> $issues
		);
	}

}