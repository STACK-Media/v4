<?php 

namespace App\Services\Contentmanagers\Wordpress;

use App\Models\ContentModels\Wordpress\TaxonomyModel;

class Taxonomy extends Wordpress
{

	function get_by_column($type, $identifier_type, $identifier)
	{

		$column = $identifier_type;
		$value  = $identifier;
		$regex  = "/[^a-z0-9-_]/";

		if ($identifier_type == 'id'):

			$column = 'term_id';
			$regex  = "/[^0-9]/";

		endif;

		$value = preg_replace($regex, '', $identifier);

		$model = new TaxonomyModel;

		return $model->get_by_column($type, $column, $value);

	}

}