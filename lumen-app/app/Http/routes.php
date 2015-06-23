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

$app->get('/', function() use ($app) {
    return $app->welcome();
});

$app->get('foo/bar', function() {
    return view('helloworld', ['name' => 'FooBar']);
});

$app->get('video/{id}/{slug}', [
	'as' => 'video', 'uses' => 'App\Http\Controllers\VideoController@index'
]);

$app->get('article/{id}/{slug}', [
	'as' => 'article', 'uses' => 'App\Http\Controllers\ArticleController@index'
]);

$app->get('category/{id}/{slug}', [
	'as' => 'category', 'uses' => 'App\Http\Controllers\CategoryController@index'
]);



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