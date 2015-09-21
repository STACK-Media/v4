{!! Assets::queue('headscript', 'global', 'modernizr', '/assets/third-party/initializr/js/vendor/modernizr-2.8.3-respond-1.4.2.min.js') !!}
{!! Assets::queue('stylesheet', 'global', 'bootstrap', '/assets/third-party/initializr/css/bootstrap.min.css') !!}
{!! Assets::queue('stylesheet', 'global', 'bootstraptheme', '/assets/third-party/initializr/css/bootstrap-theme.min.css') !!}
{!! Assets::queue('stylesheet', 'global', 'global', '/assets/css/global.css') !!}
{!! Assets::queue('stylesheet', 'global', 'googlefonts', '//fonts.googleapis.com/css?family=Source+Sans+Pro:400,600|Oswald:400|Roboto+Slab:700') !!}
{!! Assets::queue('javascript', 'global', 'jquery', '/assets/js/jquery-1.11.3.min.js') !!}
{!! Assets::queue('javascript', 'global', 'bootstrap', '/assets/third-party/initializr/js/vendor/bootstrap.min.js') !!}
{!! Assets::queue('javascript', 'global', 'jqcookie', '/assets/third-party/jquery-cookie-master/src/jquery.cookie.js') !!}
{!! Assets::queue('javascript', 'global', 'navbar', '/assets/js/navbar.js') !!}
{!! Assets::queue('javascript', 'global', 'viewport', '/assets/js/viewport.js') !!}
{!! Assets::queue('javascript', 'global', 'events', '/assets/js/events.js') !!}
{!! Assets::queue('javascript', 'global', 'lazyload', '/assets/js/lazyload.js') !!}
{!! Assets::queue('javascript', 'global', 'promo', '/assets/js/promocode.js') !!}

<?php // include custom vertical assets ?>
@if (view()->exists('theme::partials.assets'))
	@include('theme::partials.assets')
@endif

<?php /*<meta charset="utf-8">*/ ?>
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="description" content="">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta property="og:site_name" content="STACK" name="og:site_name" />


<title>{!! (is_object($page) && $page->name) ? $page->name . ' |' : ''; !!} STACK</title>

<?php /*
@if(Input::get('whatami'))

<!-- {!! ((defined('HHVM_VERSION')) ? 'HHVM' : 'PHP') !!} -->

@endif
*/ ?>

@include('theme::partials.pixels.global')

<?php
// include global pixels
// include custom pixels@include('theme::partials.pixels.custom')
