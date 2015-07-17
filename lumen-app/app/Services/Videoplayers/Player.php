<?php 

namespace App\Services\Videoplayers;

use App\Services\Service;

abstract class Player extends Service
{

	abstract public function get();
	abstract public function playlist();

} 