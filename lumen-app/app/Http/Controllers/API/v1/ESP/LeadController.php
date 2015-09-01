<?php

namespace App\Http\Controllers\API\v1\ESP;

use App\Http\Controllers;
use Laravel\Lumen\Routing\Controller as BaseController;
use App\Services\Cacheturbator as Cacher;
use Request;

class LeadController extends BaseController {

	public function __construct()
	{

	}

	/* GET: get all */
	public function index()
	{
		echo 'get all leads';
	}

	/* GET: get single */
	public function show($id)
	{
		echo 'get lead: '.$id;
	}

	/* POST: create new */
	public function create()
	{
		echo 'create new lead';
	}

	/* PUT: update */
	public function update($id)
	{
		echo 'update lead: '.$id;
	}

	/* DELETE:  remove */
	public function delete($id)
	{
		echo 'remove lead: '.$id;
	}
}