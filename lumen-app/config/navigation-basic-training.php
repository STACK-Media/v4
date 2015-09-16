<?php 
return array(
	array(
		'args'    => array('slug' => 'branch', 'id' => 6420, 'count' => 3),
		'url'     => routelink('category', array('slug' => 'branch')),
		'type'    => 'taxonomy',
		'name'    => 'Branch',
		'submenu' => array(
			array(
				'args' => array('slug' => 'navy-branch', 'id' => 6424, 'vertical' => 'basic-training'),
				'url'  => routelink('category', array('slug' => 'navy-branch')),
				'type' => 'taxonomy',
				'name' => 'Navy',
			),
			array(
				'args' => array('slug' => 'air-force', 'id' => 6423, 'vertical' => 'basic-training'),
				'url'  => routelink('category', array('slug' => 'air-force')),
				'type' => 'taxonomy',
				'name' => 'Air Force',
			),
			array(
				'args' => array('slug' => 'army-branch', 'id' => 6420, 'vertical' => 'basic-training'),
				'url'  => routelink('category', array('slug' => 'army-branch')),
				'type' => 'taxonomy',
				'name' => 'Army',
			),
			array(
				'args' => array('slug' => 'coast-guard-branch', 'id' => 6716, 'vertical' => 'basic-training'),
				'url'  => routelink('category', array('slug' => 'coast-guard-branch')),
				'type' => 'taxonomy',
				'name' => 'Coast Guard',
			),
			array(
				'args' => array('slug' => 'marines', 'id' => 6422, 'vertical' => 'basic-training'),
				'url'  => routelink('category', array('slug' => 'marines')),
				'type' => 'taxonomy',
				'name' => 'Marines',
			),
			array(
				'args' => array('slug' => 'army-national-guard', 'id' => 6421, 'vertical' => 'basic-training'),
				'url'  => routelink('category', array('slug' => 'army-national-guard')),
				'type' => 'taxonomy',
				'name' => 'National Guard',
			),
		),
	),
	array(
		'args'    => array('slug' => 'fitness-2', 'id' => 6425, 'count' => 4, 'vertical' => 'basic-training'),
		'url'     => routelink('category', array('slug' => 'fitness-2')),
		'type'    => 'taxonomy',
		'name'    => 'Fitness',
		'submenu' => array(),
	),
	array(
		'args'    => array('slug' => 'leadership-2', 'id' => 6426, 'count' => 4, 'vertical' => 'basic-training'),
		'url'     => routelink('category', array('slug' => 'leadership-2')),
		'type'    => 'taxonomy',
		'name'    => 'Leadership',
		'submenu' => array(),
	),
	array(
		'args'    => array('slug' => 'mental-toughness-2', 'id' => 6427, 'count' => 4, 'vertical' => 'basic-training'),
		'url'     => routelink('category', array('slug' => 'mental-toughness-2')),
		'type'    => 'taxonomy',
		'name'    => 'Toughness',
		'submenu' => array(),
	),
	array(
		'args'    => array('slug' => 'careers', 'id' => 6428, 'count' => 4, 'vertical' => 'basic-training'),
		'url'     => routelink('category', array('slug' => 'careers')),
		'type'    => 'taxonomy',
		'name'    => 'Careers',
		'submenu' => array(),
	),
	array(
		'args' => array('slug' => 'resources'),
		'url'  => routelink('page', array('slug' => 'resources')),
		'type' => 'static',
		'name' => 'Resources',
	),
	array(
		'args'    => array('slug' => 'videos', 'all' => array('tag:bt'), 'count' => 4),
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