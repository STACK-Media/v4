<?php 
return array(
	array(
		'args'    => array('slug' => 'fitness-training', 'id' => 8619, 'count' => 4),
		'url'     => routelink('category', array('slug' => 'fitness-training')),
		'type'    => 'taxonomy',
		'name'    => 'Fitness',
		'submenu' => array(),
	),
	array(
		'args'    => array('slug' => 'running', 'id' => 8842, 'count' => 4),
		'url'     => routelink('category', array('slug' => 'running')),
		'type'    => 'taxonomy',
		'name'    => 'Running',
		'submenu' => array(),
	),
	array(
		'args'    => array('slug' => 'health', 'id' => 8841, 'count' => 4),
		'url'     => routelink('category', array('slug' => 'health')),
		'type'    => 'taxonomy',
		'name'    => 'Health',
		'submenu' => array(),
	),
	array(
		'args'    => array('slug' => 'nutrition-2', 'id' => 15, 'count' => 4),
		'url'     => routelink('category', array('slug' => 'nutrition-2')),
		'type'    => 'taxonomy',
		'name'    => 'Nutrition',
		'submenu' => array(),
	),
	array(
		'args'    => array('slug' => 'performance-gear', 'id' => 25, 'count' => 4),
		'url'     => routelink('category', array('slug' => 'performane-gear')),
		'type'    => 'taxonomy',
		'name'    => 'Gear',
		'submenu' => array(),
	),
	array(
		'args'    => array('slug' => 'videos', 'all' => array('tag:fit'), 'count' => 4),
		'url'     => routelink('videos', array('slug' => '')),
		'type'    => 'video',
		'name'    => 'Videos',
		'submenu' => array(),
	),
	array(
		'args' => array('slug' => 'guided'),
		'url'  => routelink('search', array('slug' => 'guided')),
		'type' => 'static',
		'name' => 'Guided Search',
	),
);