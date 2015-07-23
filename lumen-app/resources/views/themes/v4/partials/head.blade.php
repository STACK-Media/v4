{!! Assets::queue('headscript', 'global', 'modernizr', '/assets/third-party/initializr/js/vendor/modernizr-2.8.3-respond-1.4.2.min.js') !!}
{!! Assets::queue('stylesheet', 'global', 'bootstrap', '/assets/third-party/initializr/css/bootstrap.min.css') !!}
{!! Assets::queue('stylesheet', 'global', 'bootstraptheme', '/assets/third-party/initializr/css/bootstrap-theme.min.css') !!}
{!! Assets::queue('stylesheet', 'global', 'global', '/assets/css/global.css') !!}
{!! Assets::queue('stylesheet', 'global', 'googlefonts', '//fonts.googleapis.com/css?family=Source+Sans+Pro:400,600|Oswald:400|Roboto+Slab:700') !!}

<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="description" content="">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta property="og:site_name" content="STACK" name="og:site_name" />

<title>STACK Home | STACK</title>

@include('theme::partials.pixels.global')

<?php
// include global pixels
// include custom pixels@include('theme::partials.pixels.custom')
