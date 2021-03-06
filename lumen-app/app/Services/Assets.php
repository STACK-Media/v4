<?php namespace App\Services;

use Minify;

class Assets extends Service {

	static 
		$_scripts,
		$_pub_dir = '../public_html';

	static function queue($type, $group, $key, $src, $custom = array())
	{
		return self::_queue('minify', $type, $group, $key, $src, $custom);	
	}

	static function queue_raw($type, $group, $key, $src, $custom = array())
	{
		return self::_queue('raw', $type, $group, $key, $src, $custom);
	}

	static function get_queued($type)
	{

		$environment     = app()->environment();
		$default_attribs = array();

		$funcs = array(
			'stylesheet' => 'stylesheet',
			'javascript' => 'javascript',
			'headscript' => 'javascript'
		);

		if ( ! array_key_exists($type, $funcs)):

			return self::get_queued_raw($type);

		endif;

		$queued  = self::_get_queued('minify', $type);

		$groups  = array();

		foreach ($queued as $key => $array):

			if ($environment == 'local'):

				$default_attribs = array('grp' => $array['group']);

			endif;

			$groups[$array['group']]['scripts'][$key] = $array['src'];

			$groups[$array['group']]['attribs']   = (isset($groups[$array['group']]['attribs']) ? $groups[$array['group']]['attribs'] : $default_attribs);

			if (isset($array['custom']) && is_array($array['custom'])):

				$groups[$array['group']]['attribs'] = array_merge($groups[$array['group']]['attribs'], $array['custom']);

			endif;		

		endforeach;


		if (array_key_exists('global', $groups)):

			if (array_key_exists('scripts', $groups['global']) && array_key_exists('jquery', $groups['global']['scripts'])):

				// want jquery first in javascript list for dependencies
				$groups['global']['scripts'] = array('jquery' => $groups['global']['scripts']['jquery']) + $groups['global']['scripts'];

			endif;

			// want global stuff first
			$groups = array('global' => $groups['global']) + $groups;

		endif;

		$return = '';

		foreach ($groups as $group => $arr):

			$function = $funcs[$type];

			$return .= Minify::$function($arr['scripts'], $arr['attribs']);

		endforeach;

		return $return;

	}

	static function get_queued_raw($type)
	{

		return self::_get_queued('raw', $type);

	}

	static function themed($filepath)
	{
		$public   = self::_get_public();
		
		$theme    = config('theming.theme');
		$subtheme = config('theming.subtheme');

		$paths = array(
			'global' => $public . '/assets'
		);

		$paths['theme'] = self::_qualify_path($public .'/assets/themes/'.$theme);

		if ($subtheme && $paths['theme']):

			$paths['subtheme'] = self::_qualify_path($paths['theme'] . '/subthemes/'.$subtheme);

		endif;


		$paths = array_reverse(array_filter($paths));

		foreach ($paths AS $key => $location):

			$path = self::_qualify_path($location . '/' . $filepath, FALSE);

			if ($path):

				return self::_web_path($path);

			endif;

		endforeach;

		return $filepath;

	}

	static function _get_public()
	{
		return realpath(rtrim(app()->basePath(self::$_pub_dir), '/'));
	}

	static function _qualify_path($fullpath, $dir = TRUE)
	{

		if ($fullpath):

			$themepath = realpath($fullpath);

			if (file_exists($themepath) && (($dir && is_dir($themepath)) || ( ! $dir && ! is_dir($themepath)))):

				return $themepath;

			endif;

		endif;

		return FALSE;
	}

	static function _web_path($path)
	{

		$pub = str_replace('../','',self::$_pub_dir);

		return str_replace('\\', '/', substr(strstr($path, $pub), strlen($pub), strlen($path)));
	}


	static function _queue($minify, $type, $group, $key, $src, $custom = array())
	{

		if ( ! is_array($custom)):

			$custom = array();

		endif;

		$location = 'remote';

		if (strpos($src, '//') === FALSE):

			$location = 'local';

			if ( ! file_exists(rtrim(app()->basePath('../public_html/'.ltrim($src,'/')), '/'))):

				return FALSE;

			endif;

		endif;

		$minify_key = ($minify == 'minify' && $location !== 'remote') ? 'minify' : 'raw';

		self::$_scripts[$minify_key][$type][$key] = array(
			'group'  => $group,
			'src'    => $src,
			'custom' => $custom
		);

	}

	static function _get_queued($minify, $type)
	{

		$minify_key = ($minify == 'minify') ? 'minify' : 'raw';

		if ( ! isset(self::$_scripts[$minify_key][$type])):

			return FALSE;

		endif;

		return self::$_scripts[$minify_key][$type];

	}

} 
