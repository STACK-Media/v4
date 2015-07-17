<?php namespace App\Services;

class Assets extends Service {

	static 
		$_scripts,
		$_pub_dir = '../public_html';

	static function queue($type, $key, $src, $custom = '')
	{
		self::$_scripts[$type][$key] = array(
			'src'		=> $src,
			'custom'	=> $custom
		);
	}

	static function get($type)
	{

		if ( ! isset(self::$_scripts[$type])):

			return FALSE;

		endif;

		return self::$_scripts[$type];

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

} 
