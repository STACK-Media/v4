<?php namespace App\Services;

class Assets extends Service
{

	static $_scripts;

	static function queue($type, $key, $src){

		self::$_scripts[$type][$key] = $src;

	}

	static function get($type){

		if ( ! isset(self::$_scripts[$type])):

			return FALSE;

		endif;

		return self::$_scripts[$type];

	}

} 
