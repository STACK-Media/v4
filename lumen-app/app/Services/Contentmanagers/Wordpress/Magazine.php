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

	public function get($slug=FALSE)
	{
		return $this->_model->get($slug);
	}

	public function all()
	{
		return $this->_model->all();
	}

	public function current()
	{
		return $this->_model->current();
	}

	public function articles($id)
	{
		return $this->_model->articles($id);
	}
}