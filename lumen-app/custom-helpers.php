<?php

if( ! function_exists('routelink')):

	function routelink($route, $params = array())
	{

		//$subtheme = config('theming.subtheme');
		//$routekey = $subtheme.$route;

		return route($route, $params);

	}

endif;
