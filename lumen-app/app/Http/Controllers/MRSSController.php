<?php 
namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;
use App\Services\MRSSFeed;

class MRSSController extends BaseController
{
    public function __construct()
    {
        // initialize MRSS Service
        $this->mrss     = new MRSSFeed();
    }

    public function index($feed)
    {
    	// grab this feed's data
    	$data 	        = $this->mrss->feed($feed);

        // set slug (based on feed name)
        $data['slug']   = $feed;

    	// return MRSS
        return response(view('global.mrss', $data),200)->header('Content-type','application/xml; charset=utf-8',TRUE);
    }
} 
