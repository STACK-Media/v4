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
<meta http-equiv="X-UA-Compatible"	content="IE=edge,chrome=1">
<meta name="viewport" 				content="width=device-width, initial-scale=1">

<!-- Default Meta -->
<meta name="description" 	content="{!! $page->metatags['description'] !!}">
<meta name="keywords" 		content="<?php echo strtolower(implode(',',$page->metatags['keywords'])); ?>">

<!-- Open Graph Meta -->
<meta property="og:site_name" 	name="og:site_name" 	content="STACK" />
<meta property="og:type" 		name="og:type" 			content="website" />
<meta property="og:title" 		name="og:title" 		content="{!! $page->metatags['title'] !!}" />
<meta property="og:url" 		name="og:url" 			content="{!! $page->metatags['url'] !!}" />
<meta property="og:description" name="og:description" 	content="{!! $page->metatags['description'] !!}" />
<meta property="og:image" 		name="og:image" 		content="{!! $page->metatags['image'] !!}" />

<!-- Twitter Card Meta -->
<meta name="twitter:card" 			content="summary">
<meta name="twitter:site" 			content="@STACKMedia">
<meta name="twitter:title"			content="{!! $page->metatags['title'] !!}">
<meta name="twitter:description" 	content="{!! $page->metatags['description'] !!}">
<meta name="twitter:image" 			content="{!! $page->metatags['image'] !!}">

<title>{!! $page->metatags['title'] !!}</title>

@if(Request::input('whatami'))

<!-- {!! ((defined('HHVM_VERSION')) ? 'HHVM' : 'PHP') !!} -->

@endif

@include('theme::partials.pixels.global')

<?php
// include global pixels
// include custom pixels@include('theme::partials.pixels.custom')
