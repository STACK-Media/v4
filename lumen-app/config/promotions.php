<?php

// note: set cookie to kill/skip any promotion with promo_kill_GROUPNAME_PROMONAME=true
// 		for example, set cookie when form is submitted or flyout is clicked

$promotions = array(
	// can only have one promotion from each group
	'groups' => array(
		array(
			'name'            => 'popstitial',
			'type'            => 'sequential', // or random (if sequential, shows one by one in order - if random, selects from all eligible)
			'frequency'       => FALSE, // (note frequency is per-group AND per-promotion, group always has to be higher)
			'creatives'       => array(
				'interstitial' => array(
					'whitelist' => array(
						array(
							'type'      => 'pagetype',
							'arguments' => array(
								'type' => 'home'
							)
						)
					),
					'js'        => array( // load all js files in array
						'/assets/js/interstitial.js', // how the fuck am I going to tell if this is already loaded?
					),
					'views'     => array( // randomly select one view from array
						'theme::partials/promotions/interstitial/adunit',
					),
					'frequency' => 'daily', // false, show every pageview (note: overridden by group daily frequency)
				),
				// promotion can only have "blacklist" or "whitelist" - if not whitelist, it'll be global everywhere except the blacklist
				'kaepernick' => array(
					/*'blacklist' => array(
						array(
							'type'      => 'category',
							'arguments' => array(
								'slug' => 'get-faster'
							)
						)
					),*/
					'js'        => array( // load all js files in array
						'/assets/js/popup.js', // how the fuck am I going to tell if this is already loaded?
					),
					'views'     => array( // randomly select one view from array
						'theme::partials/promotions/popups/kaepernick',
					),
					'frequency' => 'daily', // false, show every pageview (note: overridden by group daily frequency)
				)
			)
		),
		array(
			'name'      => 'flyouts',
			'type'      => 'random',
			'frequency' => FALSE,
			'creatives' => array(
				'speed-kills' => array(
					'whitelist' => array(
						array(
							'type'      => 'pagetype',
							'arguments' => array(
								'type' => 'article'
							)
						),
						array(
							'type'      => 'category',
							'arguments' => array(
								'slug' => 'get-faster'
							)
						)
					),
					'js'        => '/assets/js/flyout.js',
					'views'     => array(
						'theme::partials/promotions/flyouts/speed-kills-10', // randomly select a view
						'theme::partials/promotions/flyouts/speed-kills-4'
					),
					'frequency' => FALSE
				),
				'conditioning' => array(
					'whitelist' => array(
						array(
							'type'      => 'pagetype',
							'arguments' => array(
								'type' => 'article'
							)
						)
					),
					'js'        => '/assets/js/flyout.js',
					'views'     => array(
						'theme::partials/promotions/flyouts/conditioning'
					),
					'frequency' => FALSE
				)
			)
		)
	)
);