<?php

namespace App\Models\ContentModels;

use App\Models\Model;

abstract class AbstractPage extends Model {

	abstract public function get_by_slug($slug,$statuses);
}