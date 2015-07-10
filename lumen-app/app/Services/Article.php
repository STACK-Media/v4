<?php namespace App\Services;

use App\Models\ArticleModel;

class Article extends Page
{

	function initiate($id, $type = 'publish')
	{

		$id = preg_replace("/[^0-9]/", '', $id);

		$statuses = array('publish');

		if ($type != 'publish'):

			$statuses = array('publish','future','draft');

		endif;

		$this->_object = ArticleModel::get_by_id($id, $statuses);

	}

	
} 
