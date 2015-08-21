<?php

namespace App\Models\ContentModels;

use App\Models\Model;

abstract class AbstractMagazine extends Model {

	abstract public function get($id);
	abstract public function all();
	abstract public function current();

}