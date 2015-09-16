<?php 
return array(
	array(
		'args'    => array('slug' => 'training', 'id' => 24, 'count' => 4, 'vertical' => 'coaches-and-trainers'),
		'url'     => routelink('category', array('slug' => 'training')),
		'type'    => 'taxonomy',
		'name'    => 'Athlete Training',
		'submenu' => array(),
	),
	array(
		'args'    => array('slug' => 'sports-skills', 'id' => 8625, 'count' => 4, 'vertical' => 'coaches-and-trainers'),
		'url'     => routelink('category', array('slug' => 'sports-skills')),
		'type'    => 'taxonomy',
		'name'    => 'Skills',
		'submenu' => array(),
	),
	array(
		'args'    => array('slug' => 'sports-injuries', 'id' => 5135, 'count' => 4, 'vertical' => 'coaches-and-trainers'),
		'url'     => routelink('category', array('slug' => 'sports-injuries')),
		'type'    => 'taxonomy',
		'name'    => 'Injuries',
		'submenu' => array(),
	),
	array(
		'args'    => array('slug' => 'nutrition-2', 'id' => 15, 'count' => 4, 'vertical' => 'coaches-and-trainers'),
		'url'     => routelink('category', array('slug' => 'nutrition-2')),
		'type'    => 'taxonomy',
		'name'    => 'Nutrition',
		'submenu' => array(),
	),
	array(
		'args'    => array('slug' => 'performance-gear', 'id' => 25, 'count' => 4, 'vertical' => 'coaches-and-trainers'),
		'url'     => routelink('category', array('slug' => 'performance-gear')),
		'type'    => 'taxonomy',
		'name'    => 'Gear',
		'submenu' => array(),
	),
	array(
		'args'    => array('slug' => 'videos', 'all' => array('tag:coaches and trainers'), 'count' => 4),
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