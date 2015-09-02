<?php

namespace App\Http\Controllers\API\v1\CMS;

use App\Http\Controllers\API\v1\CMS\CMSController;
use App\Services\Contentmanager;
use Illuminate\Http\Request;

class ArticleController extends CMSController {

	public function __construct()
	{
		$this->article 	= new Contentmanager('article');
	}

	public function show($slug)
	{
		return $this->format($this->article->get_by_slug($slug));
	}
}