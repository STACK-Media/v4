<?php

namespace App\Http\Controllers\API\v1\ESP;

use App\Http\Controllers;
use Laravel\Lumen\Routing\Controller as BaseController;
use App\Services\Cacheturbator as Cacher;
use Request;

class TemplateController extends BaseController {

	public function __construct()
	{

	}

	/* GET: get all */
	public function index()
	{
		echo 'get all templates';
	}

	/* GET: get single */
	public function show($id)
	{
		echo 'get template: '.$id;
	}

	/* POST: create new */
	public function create()
	{
		echo 'create new template';
	}

	/* PUT: update */
	public function update($id)
	{
		echo 'update tempalte: '.$id;
	}

	/* DELETE:  remove */
	public function delete($id)
	{
		echo 'remove template: '.$id;
	}
}