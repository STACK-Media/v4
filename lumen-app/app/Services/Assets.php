<?php namespace App\Services;

class Assets extends Service {

	static $_scripts;

	static function queue($type, $key, $src, $custom='')
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

	static function themed($filepath)
	{

		$pub_dir  = 'public_html';

		$public   = realpath(rtrim(app()->basePath('../'.$pub_dir), '/'));
		$theme    = config('theming.theme');
		$subtheme = config('theming.subtheme');

		$paths = array(
			'global' => $public . '/assets'
		);

		if ($theme):

			$themepath = realpath($public .'/assets/themes/'.$theme);

			if (file_exists($themepath) && is_dir($themepath)):

				$paths['theme'] = $themepath;

			endif;

		endif;

		if ($subtheme && isset($paths['theme'])):

			$subpath = realpath($paths['theme'] . '/subthemes/'.$subtheme);

			if (file_exists($subpath) && is_dir($subpath)):

				$paths['subtheme'] = $subpath;

			endif;

		endif;


		$paths = array_reverse(array_filter($paths));

		foreach ($paths AS $key => $location):

			$path = realpath($location . '/' . $filepath);

			if (file_exists($path) && ! is_dir($path)):

				$pubpath = str_replace('\\', '/', substr(strstr($path, $pub_dir), strlen($pub_dir), strlen($path)));

				return $pubpath;

			endif;

		endforeach;

		return $filepath;

	}

} 
