<?php namespace App\Models;

class TestHTML extends Model
{

	public static $_scripts;

	static function queue($type, $key, $src){

		self::$_scripts[$type][$key] = $src;

	}

	static function get($type){

		return self::$_scripts[$type];

	}

} 
