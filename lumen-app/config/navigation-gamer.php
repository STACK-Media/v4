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
		'args'    => array('slug' => 'videos', 'all' => array('tag:gamer'), 'count' => 4),
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