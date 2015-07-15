<?php 

namespace App\Services;

class Videoplayer extends Service
{

	private $_class = 'Brightcove';

	protected $_player;

	function __construct()
	{
		parent::__construct();

		$class = 'Videoplayers\\'.$this->_class;

		$this->_player = new $class();
	}

	public function __get($attrib_name)
	{

		if (is_object($this->_player) && $this->_player->$attrib_name) {
			return $this->_player->$attrib_name;
		}

		return NULL;
	}

	public function __set($attrib_name, $value)
	{
		return $this->_player->$attrib_name = $value;
	}

}