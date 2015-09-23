<?php 
namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;
use App\Services\Cacheturbator as Cacher;
use Request;

class VanityController extends BaseController
{
	var $_vanity;

	public function __construct()
	{
		// load vanity config
		app()->configure('vanity');

		// set vanity URLs
		$this->_vanity 	= config('vanity');
	}

	public function index()
	{
		// get current URL path
		$vanity 	= \Request::path();
		
		// see if this vanity URL exists
		if ( ! isset($this->_vanity[$vanity]))
			abort(404);

		// grab needed variables
		$page		= $this->_vanity[$vanity]['page'];
		$params 	= $this->_vanity[$vanity]['params'];

		// perform redirect
		return redirect()->route($page,$params);
	}

}