<?php namespace App\Services;

class Assets extends Service
{

	static $_scripts;

	function queue($type, $key, $src){

		self::$_scripts[$type][$key] = $src;

	}

	static function get($type){

		return self::$_scripts[$type];

	}

} 
