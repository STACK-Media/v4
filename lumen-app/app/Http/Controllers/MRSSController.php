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
    	$data 	        = $this->$feed();

        // set slug (based on feed name)
        $data['slug']   = $feed;

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
            'sort_by'           => 'PUBLISH_DATE',
            'sort_order'        => 'DESC',
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

                // concatenate categories and subcategories
                $categories     = ($subcategory != '' AND $category != $subcategory)? $category.','.$subcategory: $category;

    			// set formatted response
    			$response[]	= array(
    				'id' 		=> $value['id'],
    				'title'		=> $title,
    				'link' 		=> urlencode($value['link'].'?utm_source=cbs&utm_medium=mrss'),
    				'published'	=> date('D, d M Y H:i:s +0000',($value['publishedDate']/1000)),
    				'media'		=> array(
    					'content'		=> array(
    						'value'		=> '',
    						'url'		=> $this->_mp4($value['FLVURL'],$value['renditions']),
    						'medium'	=> 'video'
    					),
    					'title' 		=> $title,
    					'description'	=> "<![CDATA[".$value['shortDescription']."]]>",
    					'category'		=> $categories,
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

        // grab xmlns
        $xmlns      = array_merge(array('cbs' => 'http://xml.cbs.com/field'),$this->_xmlns());

    	// return formatted response
    	return array(
    		'items' 	=> $response,
            'xmlns'     => $xmlns
    	);
    }

    private function yahoo()
    {
        // load Manager
        $this->cms  = new Contentmanager('article');
        $this->tax  = new Contentmanager('taxonomy');

         // initialize variables
        $xmlns      = $this->_xmlns();  // default xmlns
        $response   = array();
        
        // grab article data
        $data       = $this->cms->get_recent(10,0);

        // error handling
        if (isset($data)):

            // iterate data
            foreach ($data AS $key => $value):

                // initialize variables
                $title      = htmlspecialchars($value->name);

                // grab article taxonomies
                $taxonomy   = $this->tax->get_by_article_id($value->id);

                // set categories
                $categories = '';
                foreach ($taxonomy['category'] AS $keys => $values):

                    // add category
                    $categories     = ($keys == 0)? $values->name: ','.$values->name;

                endforeach;

                // add to response
                $response[]     = array(
                    'title'     => $title,
                    'link'      => routelink('article',array('slug' => $value->slug)),
                    'author'    => $value->author_name,
                    'pubDate'   => date('D, d M Y H:i:s +0000',strtotime($value->post_date)),
                    'guid'      => array(
                        'value'         => $value->guid,
                        'isPermalink'   => 'true'
                    ),
                    'description'       => "<![CDATA[".$this->_excerpt($value->post_content,'30','')."]]>",
                    'content'   => array(
                        'encoded'       => "<![CDATA[".$value->post_content."]]>"
                    ),
                    'category'          => $categories,
                    'media'     => array(
                        'thumbnail'     => array(
                            'value' => '',
                            'url'   => $value->image
                        )
                    )
                );

            endforeach;

        endif;

        // return formatted response
        return array(
            'items'     => $response,
            'xmlns'     => $xmlns
        );
    }

    private function yahoovideo()
    {
        // load Managers
        $this->vms  = new Videomanager('video');

        // initialize variables
        $xmlns      = $this->_xmlns();  // default xmlns
        $response   = array();

        // initialize params
        $params     = array(
            'video_fields'      => 'FLVURL,renditions,playsTotal,id,name,thumbnailURL,publishedDate,videoStillURL,shortDescription,longDescription,tags,customFields',
            'none'              => 'tag:noyahoo',
            'page_size'         => '20',
        );

        // grab video data
        $data       = $this->vms->search($params);

        // make sure we have videos returned
        if (isset($data['videos']) AND is_array($data['videos'])):

            // iterate videos
            foreach ($data['videos'] AS $key => $value):

                // initialize needed variables
                $title          = htmlspecialchars($value['name']);
                $subcategory    = (isset($value['customFields']['subcategory']))? $value['customFields']['subcategory']: '';
                $category       = (isset($value['customFields']['maincategory']))? $value['customFields']['maincategory']: $subcategory;

                // concatenate categories and subcategories
                $categories     = ($subcategory != '' AND $category != $subcategory)? $category.','.$subcategory: $category;

                // set formatted response
                $response[] = array(
                    'link'      => $value['link'],
                    'title'     => $title,
                    'guid'      => array(
                        'value'         => $value['id'],
                        'isPermalink'   => 'false'
                    ),
                    'pubDate'   => date('D, d M Y H:i:s +0000',($value['publishedDate']/1000)),
                    'media'     => array(
                        'content'       => array(
                            'value'     => '',
                            'url'       => $this->_mp4($value['FLVURL'],$value['renditions']),
                            'medium'    => 'video'
                        ),
                        'title'         => $title,
                        'description'   => "<![CDATA[".$value['shortDescription']."]]>",
                        'category'      => $categories,
                        'keywords'      => implode(',',$value['tags']),
                        'thumbnail'     => array(
                            'url'   => $value['videoStillURL']
                        )
                    )
                );

            endforeach;

        endif;       

        // return formatted response
        return array(
            'items'     => $response,
            'xmlns'     => $xmlns
        );
    }

    private function _xmlns()
    {
        return array(
            'media'     => 'http://search.yahoo.com/mrss',
            'content'   => 'http://purl.org/rss/1.0/modules/content/',
            'wfw'       => 'http://wellformedweb.org/CommentAPI/',
            'dc'        => 'http://purl.org/dc/elements/1.1/',
            'atom'      => 'http://www.w3.org/2005/Atom',
            'sy'        => 'http://purl.org/rss/1.0/modules/syndication/',
            'slash'     => 'http://purl.org/rss/1.0/modules/slash/'
        );
    }

    // find highest quality mp4 
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

    private function _excerpt($content,$numOfWords = '55', $readmore='...')
    {
        //$content = strip_shortcodes($content);
        $content =preg_replace("/\[brightcove ([^]]*)\/\]/i", "", $content);
        
        $content = str_replace(']]>', ']]&gt;', $content);
        $content = str_replace('&nbsp;','',$content);

        //need to get rid of the images and html tags
        $content = strip_tags($content);

        $array = explode(" ", $content);
        if(count($array) <= $numOfWords)
        {
            $excert = $content;
        }
        else
        {
            array_splice($array,$numOfWords);
            $excert = implode(" ",$array) . $readmore;
        }
        return $excert;        
    }
} 
