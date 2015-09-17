<?php 
return array(
	array(
		'args'    => array('slug' => 'training', 'id' => 24, 'count' => 4, 'vertical' => '4w'),
		'url'     => routelink('category', array('slug' => 'training')),
		'type'    => 'taxonomy',
		'name'    => 'Training',
		'submenu' => array(),
	),
	array(
		'args'    => array('slug' => 'nutrition-2', 'id' => 15, 'count' => 4, 'vertical' => '4w'),
		'url'     => routelink('category', array('slug' => 'nutrition-2')),
		'type'    => 'taxonomy',
		'name'    => 'Nutrition',
		'submenu' => array(),
	),
	array(
		'args'    => array('slug' => 'sports-skills', 'id' => 8625, 'count' => 4, 'vertical' => '4w'),
		'url'     => routelink('category', array('slug' => 'sports-skills')),
		'type'    => 'taxonomy',
		'name'    => 'Skills',
		'submenu' => array(),
	),
	array(
		'args'    => array('slug' => 'performance-gear', 'id' => 25, 'count' => 4, 'vertical' => '4w'),
		'url'     => routelink('category', array('slug' => 'performance-gar')),
		'type'    => 'taxonomy',
		'name'    => 'Gear',
		'submenu' => array(),
	),
	array(
		'args'    => array('slug' => 'lifestyle', 'id' => 11, 'count' => 4, 'vertical' => '4w'),
		'url'     => routelink('category', array('slug' => 'lifestyle')),
		'type'    => 'taxonomy',
		'name'    => 'Lifestyle',
		'submenu' => array(),
	),
	array(
		'args'    => array('slug' => 'sports', 'id' => 8658, 'count' => 4, 'vertical' => '4w'),
		'url'     => routelink('category', array('slug' => 'sports')),
		'type'    => 'taxonomy',
		'name'    => 'Sports',
		'submenu' => array(),
	),
	array(
		'args'    => array('slug' => 'videos', 'all' => array('tag:4w'), 'count' => 4),
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