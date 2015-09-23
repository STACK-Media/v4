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
			die('you have reached this page in error');


		redirect()->route('stack-velocity');
		//\Route::action('ContentController@index');
		//echo 'still good';
		exit;
	}

}