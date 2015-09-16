<?php 
return array(
	array(
		'args'    => array('slug' => 'gaming-lifestyle', 'id' => 134, 'count' => 4, 'vertical' => 'gamer'),
		'url'     => routelink('category', array('slug' => 'gaming-lifestyle')),
		'type'    => 'category',
		'name'    => 'Gaming',
		'submenu' => array(),
	),
	array(
		'args'    => array('slug' => 'features', 'id' => 8396, 'count' => 4, 'vertical' => 'gamer'),
		'url'     => routelink('tag', array('slug' => 'features')),
		'type'    => 'category',
		'name'    => 'Features',
		'submenu' => array(),
	),
	array(
		'args'    => array('slug' => 'entertainment', 'id' => 6890, 'count' => 4, 'vertical' => 'gamer'),
		'url'     => routelink('category', array('slug' => 'entertainment')),
		'type'    => 'category',
		'name'    => 'Entertainment',
		'submenu' => array(),
	),
	array(
		'args'    => array('slug' => 'tech-lifestyle', 'id' => 146, 'count' => 4, 'vertical' => 'gamer'),
		'url'     => routelink('category', array('slug' => 'tech-lifestyle')),
		'type'    => 'category',
		'name'    => 'Tech',
		'submenu' => array(),
	),
	array(
		'args' => array('slug' => 'resources'),
		'url'  => routelink('page', array('slug' => 'resources')),
		'type' => 'static',
		'name' => 'Resources',
	),
	array(
		'args'    => array('slug' => 'videos'),
		'url'     => routelink('videos', array('slug' => '')),
		'type'    => 'videos',
		'name'    => 'Videos',
		'submenu' => array(
			array(
				'args' => array('slug' => 'michael-johnson-performance'),
				'url'  => routelink('videos', array('slug' => 'michael-johnson-performance')),
				'type' => 'videos',
				'name' => 'Michael Johnson Performance',
			),
			array(
				'args' => array('slug' => 'new-balance-baseball'),
				'url'  => routelink('videos', array('slug' => 'new-balance-baseball')),
				'type' => 'videos',
				'name' => 'New Balance Baseball',
			),
			array(
				'args' => array('slug' => 'elite-performance-mike-boyle'),
				'url'  => routelink('videos', array('slug' => 'elite-performance-mike-boyle')),
				'type' => 'videos',
				'name' => 'STACK Elite Performance',
			),
			array(
				'args' => array('slug' => 'stack-fitness-weekly'),
				'url'  => routelink('videos', array('slug' => 'stack-fitness-weekly')),
				'type' => 'videos',
				'name' => 'STACK Fitness Weekly',
			),
			array(
				'args' => array('slug' => 'todd-durkin-workouts'),			
				'url'  => routelink('videos', array('slug' => 'todd-durkin-workouts')),
				'type' => 'videos',
				'name' => 'Todd Durkin\'s World-Class Workouts',
			),
			array(
				'args' => array('slug' => 'path-to-the-pros-2015'),
				'url'  => routelink('videos', array('slug' => 'path-to-the-pros-2015')),
				'type' => 'videos',
				'name' => 'Path to the Pros: 2015',
			),
		),
	),
	array(
		'args' => array('slug' => 'guided'),
		'url'  => routelink('search', array('slug' => 'guided')),
		'type' => 'static',
		'name' => 'Guided Search',
	),
);