<?php 

namespace App\Services\Contentmanagers\Wordpress;

use App\Models\ContentModels\Wordpress\ArticleModel;

class Article extends Wordpress
{

	function get_by_id($id, $type = 'publish')
	{

		$id = preg_replace("/[^0-9]/", '', $id);

		$statuses = array('publish');

		if ($type != 'publish'):

			$statuses = array('publish','future','draft');

		endif;

		$model = new ArticleModel;

		return $model->get_by_id($id, $statuses);

	}

}