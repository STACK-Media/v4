<?php 
namespace App\Services;

class HomePage extends Page
{

	function __construct($args = array())
	{
		$playlist 	= new Videomanager('playlist');

		// intiialzie hoempage playlist
		$id 		= '618442261001';

		$this->_object = $playlist->get($id);
	
		return parent::__construct();
	}

	
} 
