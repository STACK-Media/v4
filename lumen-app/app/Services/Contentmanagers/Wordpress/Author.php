<?php 

namespace App\Services\Contentmanagers\Wordpress;

use App\Models\ContentModels\Wordpress\AuthorModel;

class Author extends Wordpress
{

	private $_model;

	public function __construct()
	{
		parent::__construct();

		$this->_model = new AuthorModel;
	}

	public function featured()
	{
		return $this->_model->featured();
	}

}