<?php

namespace App\Models\ContentModels;

use App\Models\Model;

abstract class AbstractTaxonomy extends Model {

	abstract public function get_by_column($type, $column, $value);

}