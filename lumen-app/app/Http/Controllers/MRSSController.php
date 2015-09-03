<?php 
namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;
use App\Services\Contentmanager;
use App\Services\Videomanager;


class MRSSController extends BaseController
{
    public function index($feed)
    {
    	// verify valid feed was passed
    	if ( ! $feed OR ! method_exists($this,$feed))
    		die('invalid mrss feed');

    	// grab this feed's data
    	$data 	= $this->$feed();

    	// return MRSS
        return response(view('global.mrss', $data),200)->header('Content-type','application/xml; charset=utf-8',TRUE);
    }

    private function cbs()
    {
    	// load Video Manager
    	$this->vms 	= new Videomanager('video');

    	// initialize params
    	$params 	= array(
    		'all'				=> 'tag:CBS',
    		'media_delivery' 	=> 'http',
    	);

    	// grab CBS data
    	$data 		= $this->vms->search($params);

    	// initialize response variables
    	$response 	= array();

    	// make sure we have videos returned
    	if (isset($data['videos']) AND is_array($data['videos'])):

    		// iterate videos
    		foreach ($data['videos'] AS $key => $value):

    			// initialize needed variables
    			$title 			= htmlspecialchars($value['name']);
				$subcategory 	= (isset($value['customFields']['subcategory']))? $value['customFields']['subcategory']: '';
				$category 		= (isset($value['customFields']['maincategory']))? $value['customFields']['maincategory']: $subcategory;

    			// set formatted response
    			$response[]	= array(
    				'id' 		=> $value['id'],
    				'title'		=> $title,
    				'link' 		=> $value['link'],
    				'published'	=> date('D, d M Y H:i:s +0000',($value['publishedDate']/1000)),
    				'media'		=> array(
    					'content'		=> array(
    						'value'		=> '',
    						'url'		=> $this->_mp4($value['FLVURL'],$value['renditions']),
    						'medium'	=> 'video'
    					),
    					'title' 		=> $title,
    					'description'	=> "<![CDATA[".$value['shortDescription']."]]>",
    					'category'		=> $category,
    					'keywords' 		=> implode(',',$value['tags']),
    					'thumbnail' 	=> array(
    						'url'	=> $value['videoStillURL']
    					)
    				),
    				'cbs'		=> array(
    					'TMSSeriesID'			=> '',
    					'Label'					=> $title,
    					'SeriesTitle' 			=> 'STACK Videos',
    					'PrimaryCategoryName' 	=> 'Stack/Ingest Dev',
    					'PrimaryCategory'		=> '518358083680',
    					'VTAG'					=> 'site=stack;show=dev;feat=dev',
    					'CBSGenre'				=> 'Sports'
    				)
    			);

    		endforeach;

    	endif;

    	// return formatted response
    	return array(
    		'items' 	=> $response
    	);
    }

    private function yahoo()
    {

    }

    private function _mp4($flv,$renditions)
    {
		// initialize variables
		$size 	= 0;
		$mp4 	= $flv;

		// iterate renditions
		foreach ($renditions AS $key => $value):

			if ($value['size'] > $size):
				
				// set new mp4 URL
				$mp4 	= $value['url'];

				// set new size
				$size 	= $value['size'];

			endif;

		endforeach;

		// return 
		return $mp4;
    }
} 
