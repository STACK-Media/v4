<?php namespace App\Services;

use App\Models\ArticleModel;

class ArticlePage extends Page
{

	function initiate($args = array())
	{

		$paramlist = array(
			'id'   => NULL, 
			'type' => 'publish'
		);
		
		$args      = array_merge($paramlist, $args);
		extract($args);


		$id = preg_replace("/[^0-9]/", '', $id);

		$statuses = array('publish');

		if ($type != 'publish'):

			$statuses = array('publish','future','draft');

		endif;

		$this->_object = ArticleModel::get_by_id($id, $statuses);

	}

	
} 
