<?php

namespace App\Http\Controllers\API\v1\ESP;

use App\Http\Controllers\API\v1\ESP\ESPController;
use App\Services\ESPManager;
use Illuminate\Http\Request;

class LeadController extends ESPController {

	public function __construct()
	{
		$this->lead 	= new ESPManager('subscription');
	}

	/* GET: get single */
	public function show($id)
	{
		// grab lead
		return $this->format($this->lead->Get($id));
	}

	/* POST: create new */
	public function store(Request $http)
	{
		// initialize parameters
		$params 	= $http->all();
		$email 		= $params['email'];
		$vars 		= $params['vars'];
		$lists 		= $params['lists'];

		return $this->format($this->lead->Create($email,$vars,$lists));
	}

	/* PUT: update */
	public function update(Request $http, $id)
	{
		// initialize parameters
		$params 	= $http->all();
		$email 		= $params['email'];
		$vars 		= $params['vars'];
		$lists 		= $params['lists'];

		return $this->format($this->lead->Update($email,$vars,$lists));
	}

	/* DELETE:  remove */
	public function delete($id)
	{
		return $this->format($this->lead->Unsubscribe($id));
	}
}