<?php 
return array(
	array(
		'args'    => array('slug' => 'training', 'id' => 24),
		'url'     => routelink('category', array('slug' => 'training')),
		'type'    => 'category',
		'name'    => 'Training',
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
				'args' => array('slug' => 'sports-skills', 'id' => 8625),
				'url'  => routelink('category', array('slug' => 'sports-skills')),
				'type' => 'category',
				'name' => 'Skills',
			),
			array(
				'args' => array('slug' => 'flexibility-training', 'id' => 121),
				'url'  => routelink('category', array('slug' => 'flexibility-training')),
				'type' => 'category',
				'name' => 'Flexibility',
			),
			array(
				'args' => array('slug' => 'sports-injuries', 'id' => 5135),
				'url'  => routelink('category', array('slug' => 'sports-injuries')),
				'type' => 'category',
				'name' => 'Injuries',
			),
			array(
				'args' => array('slug' => 'basic-training'),
				'url'  => routelink('vertical', array('slug' => 'basic-training')),
				'type' => 'vertical',
				'name' => 'Basic Training',
			),
			array(
				'args' => array('slug' => 'fitness'),
				'url'  => routelink('vertical', array('slug' => 'fitness')),
				'type' => 'vertical',
				'name' => 'STACK Fitness',
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
		'args'    => array('slug' => 'nutrition-2', 'id' => 15),
		'url'     => routelink('category', array('slug' => 'nutrition-2')),
		'type'    => 'category',
		'name'    => 'Nutrition',
		'submenu' => array(
			array(
				'args' => array('slug' => 'eat-healthy-nutrition', 'id' => 127),
				'url'  => routelink('category', array('slug' => 'eat-healthy-nutrition')),
				'type' => 'category',
				'name' => 'Eat Healthy',
			),
			array(
				'args' => array('slug' => 'hydration-nutrition', 'id' => 129),
				'url'  => routelink('category', array('slug' => 'hydration-nutrition')),
				'type' => 'category',
				'name' => 'Hydration',
			),
			array(
				'args' => array('slug' => 'healthy-recipes', 'id' => 8618),
				'url'  => routelink('category', array('slug' => 'healthy-recipes')),
				'type' => 'category',
				'name' => 'Meals &amp; Recipes',
			),
			array(
				'args' => array('slug' => 'sports-supplements', 'id' => 126),
				'url'  => routelink('category', array('slug' => 'sports-supplements')),
				'type' => 'category',
				'name' => 'Supplements',
			),
		),
	),
	array(
		'args'    => array('slug' => 'performance-gear', 'id' => 25),
		'url'     => routelink('category', array('slug' => 'performance-gear')),
		'type'    => 'category',
		'name'    => 'Gear',
		'submenu' => array(
			array(
				'args' => array('slug' => 'apparel-gear', 'id' => 150),
				'url'  => routelink('category', array('slug' => 'apparel-gear')),
				'type' => 'category',
				'name' => 'Apparel',
			),
			array(
				'args' => array('slug' => 'equipment-gear', 'id' => 6325),
				'url'  => routelink('category', array('slug' => 'equipment-gear')),
				'type' => 'category',
				'name' => 'Equipment',
			),
			array(
				'args' => array('slug' => 'lifestyle', 'id' => 11),
				'url'  => routelink('category', array('slug' => 'lifestyle')),
				'type' => 'category',
				'name' => 'Lifestyle',
			),
			array(
				'args' => array('slug' => 'shoes-gear', 'id' => 149),
				'url'  => routelink('category', array('slug' => 'shoes-gear')),
				'type' => 'category',
				'name' => 'Shoes',
			),
			array(
				'args' => array('slug' => 'training-tools-gear', 'id' => 152),
				'url'  => routelink('category', array('slug' => 'training-tools-gear')),
				'type' => 'category',
				'name' => 'Workout Tools',
			),
		),
	),
	array(
		'args'    => array('slug' => 'sports'),
		'url'     => routelink('sport', array('slug' => '')),
		'type'    => 'sport',
		'name'    => 'Sports',
		'submenu' => array(
			array(
				'args' => array('slug' => 'football'),
				'url'  => routelink('sport', array('slug' => 'football')),
				'type' => 'sport',
				'name' => 'Football',
			),
			array(
				'args' => array('slug' => 'basketball'),
				'url'  => routelink('sport', array('slug' => 'basketball')),
				'type' => 'sport',
				'name' => 'Basketball Training',
			),
			array(
				'args' => array('slug' => 'baseball'),
				'url'  => routelink('sport', array('slug' => 'baseball')),
				'type' => 'sport',
				'name' => 'Baseball',
			),
			array(
				'args' => array('slug' => 'hockey'),
				'url'  => routelink('sport', array('slug' => 'hockey')),
				'type' => 'sport',
				'name' => 'Hockey',
			),
			array(
				'args' => array('slug' => 'soccer'),
				'url'  => routelink('sport', array('slug' => 'soccer')),
				'type' => 'sport',
				'name' => 'Soccer',
			),
			array(
				'args' => array('slug' => 'track-and-field'),
				'url'  => routelink('sport', array('slug' => 'track-and-field')),
				'type' => 'sport',
				'name' => 'Track &amp; Field',
			),
			array(
				'args' => array('slug' => 'cross-country'),
				'url'  => routelink('sport', array('slug' => 'cross-country')),
				'type' => 'sport',
				'name' => 'Cross Country',
			),
			array(
				'args' => array('slug' => 'yoga'),
				'url'  => routelink('sport', array('slug' => 'yoga')),
				'type' => 'sport',
				'name' => 'Yoga',
			),
			array(
				'args' => array('slug' => 'sports'),
				'url'  => routelink('sport', array('slug' => 'sports')),
				'type' => 'sport',
				'name' => 'More',
			),
		),
	),
	array(
		'args'    => array('slug' => 'magazine'),
		'url'     => 'REPLACE_ME',
		//'url'     => routelink('category', array('slug' => 'magazine')),
		'type'    => 'static',
		'name'    => 'Magazine',
		//'submenu' => array()
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
		'args'    => array('slug' => 'resources'),
		'url'     => routelink('page', array('slug' => 'resources')),
		'name'    => 'Resources',
		'type'    => 'page',
		'submenu' => array(
			array(
				'args' => array('slug' => 'fitness'),
				'url'  => routelink('vertical', array('slug' => 'fitness')),
				'type' => 'vertical',
				'name' => 'STACK Fitness',
			),
			array(
				'args' => array('slug' => 'coaches-and-trainers'),
				'url'  => routelink('vertical', array('slug' => 'coaches-and-trainers')),
				'type' => 'vertical',
				'name' => 'Coaches and Trainers',
			),
			array(
				'args' => array('slug' => '4w'),
				'url'  => routelink('vertical', array('slug' => '4w')),
				'type' => 'vertical',
				'name' => 'STACK 4W',
			),
			array(
				'args' => array('slug' => 'gamer'),
				'url'  => routelink('vertical', array('slug' => 'gamer')),
				'type' => 'vertical',
				'name' => 'Gamer',
			),
			array(
				'args' => array('slug' => 'basic-training'),
				'url'  => routelink('vertical', array('slug' => 'basic-training')),
				'type' => 'vertical',
				'name' => 'Basic Training',
			),
			array(
				'args' => array('slug' => 'news', 'id' => 683),
				'url'  => routelink('category', array('slug' => 'news')),
				'type' => 'category',
				'name' => 'News',
			),
			array(
				'args' => array('slug' => '2015-summer-training-guide', 'id' => 9169),
				'url'  => routelink('tag', array('slug' => '2015-summer-training-guide')),
				'type' => 'tag',
				'name' => '2015 Summer Training',
			),
			array(
				'args' => array('view' => 'conditioning'),
				'url'  => 'http://conditioning.stack.com/',
				'type' => 'static',
				'name' => 'STACK Conditioning',
			),
			array(
				'args' => array('view' => 'eastbay'),
				'url'  => 'http://www.eastbay.com',
				'type' => 'static',
				'name' => 'Eastbay',
			),
		),
	),
	array(
		'args' => array('slug' => 'stack-velocity'),
		'url'  => routelink('category', array('slug' => 'stack-velocity')),
		'type' => 'page',
		'name' => 'Training Centers',
	),
	array(
		'args' => array('slug' => 'guided'),
		'url'  => routelink('search', array('slug' => 'guided')),
		'type' => 'static',
		'name' => 'Guided Search',
	),
);