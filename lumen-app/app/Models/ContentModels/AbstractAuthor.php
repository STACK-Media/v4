<?php

use App\Models\Model;

abstract class AbstractAuthor extends Model {

	abstract public function featured();

}