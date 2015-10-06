<?php

namespace App\Models\ContentModels;

use App\Models\Model;

abstract class AbstractExercise extends Model {

	abstract public function get($id);
	
}