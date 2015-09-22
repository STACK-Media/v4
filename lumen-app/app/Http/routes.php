<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/



$route_verticals = array(
	'4w',
	'coaches-and-trainers',
	'fitness',
	'gamer',
	'basic-training',
	'gear'
);

$route_pages     = array(
	'home' => array(
		'slug'       => '',
		'controller' => 'HomeController',
		'function'   => 'index',
	),
	/*
	'api'		=> array(
		'slug'          => 'api',
		'controller'	=> 'APIController',
		'function'		=> 'index',
		'params'		=> array(
			'service','class','method'
		)
	),
	*/
	'feed'		=> array(
		'slug'          => 'feed',
		'controller'	=> 'RssController',
		'function'		=> 'index',
		'params'		=> array(
			'feed'
		)
	),
	'video' => array(
		'slug'       => 'video',
		'controller' => 'VideoController',
		'function'   => 'index',
		'params'     => array(
			'id', 'slug'
		)
	),
	'article' => array(
		'slug'       => 'a',
		'controller' => 'ContentController',
		'function'   => 'index',
		'params'     => array(
			'slug'
			//'id', 'slug'
		)
	),
	'author' => array(
		'slug'       => 'expert',
		'controller' => 'AuthorController',
		'function'   => 'index',
		'params'     => array(
			'slug'
			//'id', 'slug'
		)
	),
	'category' => array(
		'slug'       => 'c',
		'controller' => 'TaxonomyController',
		'function'   => 'category',
		'params'     => array(
			'slug'
		)
	),
	'magazine' => array(
		'slug'       => 'magazine',
		'controller' => 'MagazineController',
		'function'   => 'index',
		'params'     => array(
			'issue'
		)
	),
	'marketing' => array(
		'slug'       => 'marketing',
		'controller' => 'MarketingController',
		'function'   => 'index',
		'params'     => array(
			'slug',
			'player',
			'playlist',
			'video'
		)
	),
	'resources' => array(
		'slug'       => 'resources',
		'controller' => 'ResourcesController',
		'function'   => 'index',
		'params'     => array(

		)
	),
	'search' => array(
		'slug'       => 'search',
		'controller' => 'SearchController',
		'function'   => 'index',
		'params'     => array(

		)
	),
	'tag' => array(
		'slug'       => 't',
		'controller' => 'TaxonomyController',
		'function'   => 'tag',
		'params'     => array(
			'slug'
		)
	),
	'sport' => array(
		'slug'       => 'sport',
		'controller' => 'SportController',
		'function'   => 'index',
		'params'     => array(
			'slug'
		)
	),

	'videos' => array(
		'slug'       => 'videos',
		'controller' => 'VideoController',
		'function'   => 'archive',
		'params'     => array(
			'slug'
		)
	),

	// all these need switched out
	'vertical' => array(
		'slug'       => 'v',
		'controller' => 'TaxonomyController',
		'function'   => 'tag',
		'params'     => array(
			'slug'
		)
	),
	'page' => array(
		'slug'       => 'p',
		'controller' => 'ContentController',
		'function'   => 'page',
		'params'     => array(
			'slug'
		)
	),

);

foreach ($route_pages as $route_key => $route_arr)
{
	$route_params = '';
	$route_name   = ($route_key ? $route_key : 'home');

	if (isset($route_arr['params']) && $route_arr['params']):
		
		$route_params = '{'.implode('}/{',$route_arr['params']).'}';

	endif;

	$app->get($route_arr['slug'].'/'.$route_params, [
		'as' => $route_name, 'uses' => 'App\Http\Controllers\\'.$route_arr['controller'].'@'.$route_arr['function']
	]);

	foreach ($route_verticals as $route_vertical):

		$app->get($route_vertical.'/'.$route_arr['slug'].'/'.$route_params, array('as' => $route_vertical.$route_name, function() use ($route_vertical, $route_arr) {

			$args = func_get_args();

			// so far this only allows $slug
			return App::make('App\Http\Controllers\\'.$route_arr['controller'])->subtheme($route_vertical, $route_arr['function'], $args);

		}));

	endforeach;
}

// HACK to make magazine page work without params
$app->get('magazine',['as' => 'magazine', 'uses' => 'App\Http\Controllers\MagazineController@index']);

// MRSS Feeds
$app->get('mrss/{feed}',['uses' => 'App\Http\Controllers\MRSSController@index']);


##########################################################################################
## API ROUTING

// define all active API routes
// NOTE: This is not currently used
$api_routes 	= array(
	'cms'	=> array(
		'namespace'	=> 'App\Http\Controllers\API\v1\CMS',
		'methods'	=> array(
			'article'	=> array(
				'show'
			)
		)
	),
	'esp'	=> array(
		'namespace'	=> 'App\Http\Controllers\API\v1\ESP',
		'methods'	=> array(
			'event'		=> array(
				'trigger'
			),
			'lead'		=> array(
				'show',
				'create',
				'update',
				'delete'
			),
			'template'	=> array(
				'send',
			)
		)
	),
	'vms'			=> array(
		'namespace'	=> 'App\Http\Controllers\API\v1\VMS',
		'method'	=> array(
			'video'		=> array(
				'show',
				'search'
			),
			'playlist'	=> array(
				'show'
			),
			'player'	=> array(
				'show'
			)
		)
	)
);

// Content Manager
$app->group(['prefix' => 'api/v1/cms','namespace' => 'App\Http\Controllers\API\v1\CMS', 'middleware' => 'api-auth'], function($app) {

	// article
	$app->get('article/{slug}',	'ArticleController@show');

	// category
	// tag

});

// ESP Manager
$app->group(['prefix' => 'api/v1/esp','namespace' => 'App\Http\Controllers\API\v1\ESP', 'middleware' => 'api-auth'], function($app) {

	// event
	$app->post('event',			'EventController@trigger');

	// lead
	$app->get('lead/{id}',		'LeadController@show');
	$app->post('lead',			'LeadController@store');
	$app->put('lead/{id}',		'LeadController@update');
	//$app->delete('lead/{id}',	'LeadController@delete');

	// template
	$app->post('template',		'TemplateController@send');

});

// Video Manager
$app->group(['prefix' => 'api/v1/vms','namespace' => 'App\Http\Controllers\API\v1\VMS', 'middleware' => 'api-auth'], function($app) {

	// playlist
	$app->get('playlist/{id}',	'PlaylistController@show');

	// player
	$app->get('player/{id}',	'PlayerController@show');

	// video
	$app->get('video/{id}',		'VideoController@show');
	$app->post('video/search',	'VideoController@search');

});

// Promos Ajax
$app->get('api/v1/promos/{group}/{promo}', 'App\Http\Controllers\API\v1\PromosController@show');


// Custom pages
// a to z
$app->get('a-to-z',			['as' => 'a-to-z', 			'uses' => 'App\Http\Controllers\CustomController@atoz']);
$app->get('terms-of-use',	['as' => 'terms-of-use', 	'uses' => 'App\Http\Controllers\CustomController@terms']);
$app->get('stack-velocity',	['as' => 'stack-velocity', 	'uses' => 'App\Http\Controllers\CustomController@velocity']);


// Vanity URLs
$app->get('vanity',			['uses' => 'App\Http\Controllers\VanityController@index']);


/*
$app->group([], function($app){
	return $app->make('ContentController')->index('maya-moore-featured');
});
*/







/*
// ****************************
// OPTIONAL PARAMETERS EXAMPLE
// ****************************
$app->get('video/{video_id}', function($video_id) {
    return view('video', ['video_id' => $video_id]);
});
$app->get('video/{video_id}/{video_slug:[A-Za-z]*}', function($video_id, $video_slug) {
    return view('video', ['video_id' => $video_id, 'video_slug' => $video_slug]);
});
// END OPTIONAL PARAMETERS EXAMPLE
*/