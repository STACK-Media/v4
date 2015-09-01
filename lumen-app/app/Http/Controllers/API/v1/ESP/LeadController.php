<?php

namespace App\Http\Controllers\API\v1\ESP;

use App\Http\Controllers\API\v1\APIController;
use App\Services\ESPManager;

class LeadController extends APIController {

	public function __construct()
	{
		$this->_ESP 	= new ESPManager('subscription');
	}

	/* GET: get all */
	public function index()
	{
		echo 'get all leads';
		//return $this->response(TRUE,$this->_ESP->Get());
	}

	/* GET: get single */
	public function show($id)
	{
		$response 	= $this->_ESP->Get($id);
		return $this->response((is_array($response)),$response);
	}

	/* POST: create new */
	public function create()
	{
		return $this->response(TRUE,'create new lead');
	}

	/* PUT: update */
	public function update($id)
	{
		return $this->response(TRUE,'update lead: '.$id);
	}

	/* DELETE:  remove */
	public function delete($id)
	{
		return $this->response(TRUE,'remove lead: '.$id);
	}
}