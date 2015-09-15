<?php 
return array(
	array(
		'args'    => array('slug' => 'training', 'id' => 24),
		'url'     => routelink('category', array('slug' => 'training')),
		'type'    => 'category',
		'name'    => 'Gaming',
		'submenu' => array(
			array(
				'args' => array('slug' => 'strength-training', 'id' => 118),
				'url'  => routelink('category', array('slug' => 'strength-training')),
				'type' => 'category',
				'name' => 'Strength',
			),
			array(
				'args' => array('slug' => 'get-faster', 'id' => 119),
				'url'  => routelink('category', array('slug' => 'get-faster')),
				'type' => 'category',
				'name' => 'Get Faster',
			),
			array(
				'args' => array('view' => 'conditioning'),
				'url'  => 'http://conditioning.stack.com/',
				'type' => 'static',
				'name' => 'Conditioning',
			),
		),
	),
	array(
		'args'    => array('slug' => 'training', 'id' => 24),
		'url'     => routelink('category', array('slug' => 'training')),
		'type'    => 'category',
		'name'    => 'Features',
		'submenu' => array(
			array(
				'args' => array('slug' => 'strength-training', 'id' => 118),
				'url'  => routelink('category', array('slug' => 'strength-training')),
				'type' => 'category',
				'name' => 'Strength',
			),
			array(
				'args' => array('slug' => 'get-faster', 'id' => 119),
				'url'  => routelink('category', array('slug' => 'get-faster')),
				'type' => 'category',
				'name' => 'Get Faster',
			),
			array(
				'args' => array('view' => 'conditioning'),
				'url'  => 'http://conditioning.stack.com/',
				'type' => 'static',
				'name' => 'Conditioning',
			),
		),
	),
	array(
		'args'    => array('slug' => 'training', 'id' => 24),
		'url'     => routelink('category', array('slug' => 'training')),
		'type'    => 'category',
		'name'    => 'Entertainment',
		'submenu' => array(
			array(
				'args' => array('slug' => 'strength-training', 'id' => 118),
				'url'  => routelink('category', array('slug' => 'strength-training')),
				'type' => 'category',
				'name' => 'Strength',
			),
			array(
				'args' => array('slug' => 'get-faster', 'id' => 119),
				'url'  => routelink('category', array('slug' => 'get-faster')),
				'type' => 'category',
				'name' => 'Get Faster',
			),
			array(
				'args' => array('view' => 'conditioning'),
				'url'  => 'http://conditioning.stack.com/',
				'type' => 'static',
				'name' => 'Conditioning',
			),
		),
	),
	array(
		'args'    => array('slug' => 'training', 'id' => 24),
		'url'     => routelink('category', array('slug' => 'training')),
		'type'    => 'category',
		'name'    => 'Tech',
		'submenu' => array(
			array(
				'args' => array('slug' => 'strength-training', 'id' => 118),
				'url'  => routelink('category', array('slug' => 'strength-training')),
				'type' => 'category',
				'name' => 'Strength',
			),
			array(
				'args' => array('slug' => 'get-faster', 'id' => 119),
				'url'  => routelink('category', array('slug' => 'get-faster')),
				'type' => 'category',
				'name' => 'Get Faster',
			),
			array(
				'args' => array('view' => 'conditioning'),
				'url'  => 'http://conditioning.stack.com/',
				'type' => 'static',
				'name' => 'Conditioning',
			),
		),
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