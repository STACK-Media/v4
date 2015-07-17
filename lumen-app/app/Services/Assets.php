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

} 
