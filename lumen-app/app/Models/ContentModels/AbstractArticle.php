<?php

namespace App\Models\ContentModels;

use App\Models\Model;

abstract class AbstractArticle extends Model {

	abstract public function get_by_id($id, $statuses);

}