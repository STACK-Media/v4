<?php

return array(
	'page_configs' => array(
		'homepage'	=> array(
			'content'		=> array(
				//'latest',
				'latest-articles',
				'velocity',
				//'trending',
				'latest-videos',
				'hero',
				'featured-expert',
			),
			'sidebar'		=> array(
				'featured-videos',
				'social-connect',
				//'newsletter_optin',
				'popular-videos',
				'magazine',
				'news-links',
			),
			'post_content'	=> array()
		),
		'author' => array(
			'sidebar' => array(
				'velocity-sidebar',
				'social-connect',
				//'newsletter-optin',
				'trending-block',
			)
		),
		'article' => array(
			'content' => array(
				'outbrain',
				'zergnet',
			),
			'sidebar' => array(
				'featured-videos',
				//'newsletter-optin',
				'popular-videos',
				'trending-block',
				'velocity-sidebar'
			),
			'post_content' => array(
				'pinterest-block',
				'related-links',
			)
		),
		'category' => array(
			'content' => array(
				'latest-articles',
				'latest-videos',
			),
			'sidebar' => array(
				'featured-videos',
				'velocity-sidebar',
				'popular-videos',
				'trending-block',
			),
			'post_content' => array(

			)
		),
		'tag' => array(
			'content' => array(
				'latest-articles',
				'latest-videos',
			),
			'sidebar' => array(
				'featured-videos',
				'velocity-sidebar',
				'popular-videos',
				'trending-block',
			),
			'post_content' => array(

			)
		),
		'video' => array(
			'content' => array(

			),
			'sidebar' => array(
				'velocity-sidebar',
				'outbrain-sidebar',
				'social-connect',
				//'newsletter-optin',
				'trending-block',
			),
			'post_content' => array(

			)
		),
	)
);


/*
'content' => array(
		//'test'
		
		'player',
		'author',
		'must-see',
		
		//'zergnet',
		//'outbrain',
		'hero'
	),
	'sidebar' => array(
		'newsletter-optin',
		'magazine',
		'featured-videos',
		'popular-videos',
		//'social-connect',
		
		'trending-block',
		'outbrain'
		
	),
	'post_content' => array(

	)
);
 */