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
		'controller' => 'ArticleController',
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
		'controller' => 'TaxonomyController',
		'function'   => 'tag',
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


##########################################################################################
## API ROUTING

// define all active API routes
// NOTE: This is not currently used
$api_routes 	= array(
	'esp'	=> array(
		'namespace'	=> 'App\Http\Controllers\API\v1\ESP',
		'methods'	=> array(
			'lead'		=> array(
				'index',
				'show',
				'create',
				'update',
				'delete'
			),
			'template'	=> array(
				'index',
				'show',
				'create',
				'update',
				'delete'
			)
		)
	)
);

// ESP Manager
$app->group(['prefix' => 'api/v1/esp','namespace' => 'App\Http\Controllers\API\v1\ESP'], function($app) {

	// lead
	$app->get('lead',			'LeadController@index');
	$app->get('lead/{id}',		'LeadController@show');
	$app->post('lead',			'LeadController@create');
	$app->put('lead/{id}',		'LeadController@update');
	$app->delete('lead/{id}',	'LeadController@delete');

	// template
	$app->get('template',			'TemplateController@index');
	$app->get('template/{id}',		'TemplateController@show');
	$app->post('template',			'TemplateController@create');
	$app->put('template/{id}',		'TemplateController@update');
	$app->delete('template/{id}',	'TemplateController@delete');

});







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