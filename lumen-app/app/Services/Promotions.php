<?php namespace App\Services;

class Promotions extends Service {

	private $cfg = array();

	function __construct()
	{
		parent::__construct();

		app()->configure('promotions');

		$this->cfg = config('promotions');

	}

	function get($group, $creative)
	{
		return $this->cfg['groups'][$group]['creatives'][$creative];
	}

	function get_for_page($page_object)
	{

		$promos = array();

		foreach ($this->cfg['groups'] as $gkey => $group):

			/*
			if (isset($group['type']) && $group['type'] == 'random'):

				// remove, make randomize JS side
				$group['creatives'] = $this->_shuffle_assoc($group['creatives']);

			endif;
			*/

			foreach ($group['creatives'] as $ckey => $creative):

				// assume all promos are eligible
				$show = TRUE;

				if (isset($creative['whitelist'])):

					// if creative has a whitelist, it only appears on some pages
					$show = FALSE;

					foreach ($creative['whitelist'] as $whitelist):

						// call function based on the "type" pf whitelist
						$func = '_whitelist_'.$whitelist['type'];
						$args = (isset($whitelist['arguments']) ? $whitelist['arguments'] : array());

						if ( ! is_callable(array($this, $func))):

							continue;

						endif;

						$is_whitelisted = $this->$func($page_object, $args);

						if ($is_whitelisted):

							// promo is whitelisted, show it and stop checking
							$show = TRUE;
							break;

						endif;

					endforeach;

				elseif (isset($creative['blacklist'])):

					foreach ($creative['blacklist'] as $blacklist):

						// check if blacklisted based on the "type" of blacklist
						$func = '_blacklist_'.$blacklist['type'];
						$args = (isset($blacklist['arguments']) ? $blacklist['arguments'] : array());

						if ( ! is_callable(array($this, $func))):

							continue;

						endif;

						$is_blacklisted = $this->$func($page_object, $args);

						if ($is_blacklisted):

							// promo is blacklisted on this page
							$show = FALSE;
							break;

						endif;

					endforeach;

				endif;

				if ($show):

					$remove = array('js', 'views', 'whitelist', 'blacklist');
					$remove = array_combine($remove, array_fill(0, count($remove), NULL));

					$promos[$gkey]['type']             = $group['type'];
					$promos[$gkey]['frequency']        = $group['frequency'];
					$promos[$gkey]['creatives'][$ckey] = array_diff_key($creative, $remove);

				endif;

			endforeach;

		endforeach;

		return $promos;
	}

	function _shuffle_assoc($list) { 

		if ( ! is_array($list)):
		
			return $list; 

		endif;

		$keys = array_keys($list); 

		shuffle($keys); 

		$random = array(); 

		foreach ($keys as $key):

			$random[$key] = $list[$key]; 

		endforeach;

		return $random; 
	} 

	function _match_pagetype($page_object, $args)
	{
		return ($args['type'] == $page_object->page_type);
	}

	function _whitelist_pagetype($page_object, $args) {

		return $this->_match_pagetype($page_object, $args);

	}

	function _whitelist_category($page_object, $args)
	{
		if ($page_object->page_type !== 'category'):

			return FALSE;

		endif;

		return ($page_object->slug === $args['slug']);
	}

	function _blacklist_pagetype($page_object, $args) {

		return $this->_match_pagetype($page_object, $args);

	}
} 
