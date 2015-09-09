<?php 

namespace App\Services\Contentmanagers\Wordpress;

use App\Models\ContentModels\Wordpress\PageModel;
use App\Services\Cacheturbator as Cacher;

class Page extends Wordpress
{

	private $_model;

	function __construct()
	{
		parent::__construct();

		// cache
		$this->_model = new Cacher(new PageModel);
	}

	function get_by_slug($slug, $type = 'publish')
	{

		$slug 		= preg_replace("/[^a-z0-9-]/",'',strtolower($slug));
		$statuses 	= $this->_get_statuses($type);
		$page 		= $this->_model->get_by_slug($slug, $statuses);

		return $page;
	}

	function _get_statuses($type)
	{
		$statuses = array('publish');

		if ($type != 'publish'):

			$statuses = array('publish','future','draft');

		endif;

		return $statuses;
	}
}