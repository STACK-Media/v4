<?php

// note: set cookie to kill/skip any promotion with promo_kill_GROUPNAME_PROMONAME=true
// 		for example, set cookie when form is submitted or flyout is clicked

return array(
	// can only have one promotion from each group
	'groups' => array(
		'popstitial' => array(
			'type'            => 'sequential', // or random (if sequential, shows one by one in order - if random, selects from all eligible)
			'frequency'       => FALSE, // in seconds (note frequency is per-group AND per-promotion, group always has to be higher)
			'creatives'       => array(
				/*'interstitial' => array(
					'whitelist' => array(
						array(
							'type'      => 'pagetype',
							'arguments' => array(
								'type' => 'home'
							)
						)
					),
					'views'     => array( // randomly select one view from array
						'global.partials.promotions.interstitial.adunit',
					),
					'frequency' => '86400', // false, show every pageview (note: overridden by group 86400 frequency)
				),*/
				// promotion can only have "blacklist" or "whitelist" - if not whitelist, it'll be global everywhere except the blacklist
				'kaepernick' => array(
					'blacklist'	=> array(
						array(
							'type'		=> 'pagetype',
							'arguments'	=> array(
								'type'	=> 'marketing'
							)
						)
					),
					'views'     => array( // randomly select one view from array
						'global.partials.promotions.popups.kaepernick',
					),
					'frequency' => '86400', // show daily
				)
			)
		),
		'flyouts' => array(
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
					'views'     => array(
						'global.partials.promotions.flyouts.speed-kills-10', // randomly select a view
						'global.partials.promotions.flyouts.speed-kills-inverted',
						'global.partials.promotions.flyouts.speed-kills-inverted-darkfont'
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
					'views'     => array(
						'global.partials.promotions.flyouts.conditioning'
					),
					'frequency' => FALSE
				)
			)
		)
	)
);