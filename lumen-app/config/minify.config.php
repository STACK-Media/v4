<?php

return array(

/*
|--------------------------------------------------------------------------
| Sort Direction
|--------------------------------------------------------------------------
|
| You can set the sort direction (ascending/descending) when
| minifying full directories.
|
*/

'reverse_sort' => true,

/*
|--------------------------------------------------------------------------
| App environments to not minify
|--------------------------------------------------------------------------
|
| These environments will not be minified and all individual files are
| returned
|
*/

'ignore_environments' => array(
    'local',
),

/*
|--------------------------------------------------------------------------
| CSS build path
|--------------------------------------------------------------------------
|
| Minify is an extension that can minify your css files into one build file.
| The css_builds_path property is the location where the builded files are
| stored. This is relative to your public path. Notice the trailing slash.
| Note that this directory must be writeable.
|
*/

'css_build_path' => '/assets/css/builds/',
'css_url_path' => '/assets/css/builds/',

/*
|--------------------------------------------------------------------------
| JS build path
|--------------------------------------------------------------------------
|
| Minify is an extension that can minify your js files into one build file.
| The js_build_path property is the location where the builded files are
| stored. This is relative to your public path. Notice the trailing slash.
| Note that this directory must be writeable.
|
*/

'js_build_path' => '/assets/js/builds/',
'js_url_path' => '/assets/js/builds/', 

/*
|--------------------------------------------------------------------------
| Base URL
|--------------------------------------------------------------------------
|
| You can set the base URL for the links generated with the configuration
| value. By default if empty HTTP_HOST would be used.
|
*/
'base_url' => ''

);