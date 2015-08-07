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

$route_verticals = array('4w');

$route_pages     = array(
	'home' => array(
		'slug'       => '',
		'controller' => 'HomeController',
		'function'   => 'index',
	),
	'api'		=> array(
		'slug'          => 'api',
		'controller'	=> 'APIController',
		'function'		=> 'index',
		'params'		=> array(
			'service','class','method'
		)
	),
	'feed'		=> array(
		'slug'          => 'feed',
		'controller'	=> 'RssController',
		'function'		=> 'index',
		'params'		=> array()
	),
	'video' => array(
		'slug'       => 'v',
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
		'slug'       => 'e',
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
	'tag' => array(
		'slug'       => 't',
		'controller' => 'TaxonomyController',
		'function'   => 'tag',
		'params'     => array(
			'slug'
		)
	),
	'sport' => array(
		'slug'       => 's',
		'controller' => 'SportController',
		'function'   => 'index',
		'params'     => array(
			'slug'
		)
	)
);

foreach ($route_pages as $route_key => $route_arr)
{
	$route_params = '';
	$route_name   = ($route_key ? $route_key : 'home');

	if (isset($route_arr['params'])):
		
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