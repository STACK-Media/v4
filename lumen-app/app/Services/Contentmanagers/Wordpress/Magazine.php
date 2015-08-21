<?php 

namespace App\Services\Contentmanagers\Wordpress;

use App\Models\ContentModels\Wordpress\MagazineModel;
use App\Services\Cacheturbator as Cacher;

class Magazine extends Wordpress
{

	private $_model;

	function __construct()
	{
		parent::__construct();

		// initialize magazine model
		$this->_model = new Cacher(new MagazineModel);
	}

	public function get($id)
	{
		return array();
	}

	public function all()
	{
		return $this->_model->all();
	}

	public function current()
	{
		return array();
	}
}