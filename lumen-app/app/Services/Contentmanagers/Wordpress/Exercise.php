<?php 

namespace App\Services\Contentmanagers\Wordpress;

use App\Models\ContentModels\Wordpress\ExerciseModel;
use App\Services\Cacheturbator as Cacher;

class Exercise extends Wordpress
{

	private $_model;

	function __construct()
	{
		parent::__construct();

		// initialize magazine model
		$this->_model = new Cacher(new ExerciseModel);
	}

	public function get($id = FALSE)
	{
		return $this->_model->get($id);
	}

	public function get_by_article($id = FALSE)
	{
		return $this->_model->get_by_article($id);
	}


}