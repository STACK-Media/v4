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
	'video' => array(
		'controller' => 'VideoController',
		'function'   => 'index',
		'params'     => array(
			'id', 'slug'
		)
	),
	'article' => array(
		'controller' => 'ArticleController',
		'function'   => 'index',
		'params'     => array(
			'id', 'slug'
		)
	),
	'category' => array(
		'controller' => 'TaxonomyController',
		'function'   => 'category',
		'params'     => array(
			'slug'
		)
	),
	'tag' => array(
		'controller' => 'TaxonomyController',
		'function'   => 'tag',
		'params'     => array(
			'slug'
		)
	),
	'sport' => array(
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
	
	if ($route_arr['params']):
		
		$route_params = '{'.implode('}/{',$route_arr['params']).'}';

	endif;

	$app->get($route_key.'/'.$route_params, [
		'as' => $route_key, 'uses' => 'App\Http\Controllers\\'.$route_arr['controller'].'@'.$route_arr['function']
	]);
}

/*
$app->get('video/{id}/{slug}', [
	'as' => 'video', 'uses' => 'App\Http\Controllers\VideoController@index'
]);

$app->get('article/{id}/{slug}', [
	'as' => 'article', 'uses' => 'App\Http\Controllers\ArticleController@index'
]);

$app->get('category/{slug}', [
	'as' => 'category', 'uses' => 'App\Http\Controllers\TaxonomyController@category'
]);

$app->get('tag/{slug}', [
	'as' => 'category', 'uses' => 'App\Http\Controllers\TaxonomyController@tag'
]);

$app->get('sport/{slug}', [
	'as' => 'sport', 'uses' => 'App\Http\Controllers\SportController@index'
]);
*/

$app->get('/', [
	'as' => '/', 'uses' => 'App\Http\Controllers\HomeController@index'
]);


$app->get('4w/category/{slug}', array('as' => '4wcategory', function($slug){
	return App::make('App\Http\Controllers\TaxonomyController')->subtheme('4w','category', $slug);
}));



/*
$app->get('video/{video_id}/{video_slug}', function($video_id, $video_slug) {
    return view('video', array('video_id' => $video_id, 'video_slug' => $video_slug));
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