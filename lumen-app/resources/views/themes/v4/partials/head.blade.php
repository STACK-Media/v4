<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="description" content="">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta property="og:site_name" content="STACK" name="og:site_name" />

<title>STACK Home | STACK</title>

<script src="/assets/third-party/initializr/js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>

{!! Assets::queue('stylesheet', 'global', 'bootstrap', '/assets/third-party/initializr/css/bootstrap.min.css') !!}

{!! Assets::queue('stylesheet', 'global', 'bootstraptheme', '/assets/third-party/initializr/css/bootstrap-theme.min.css') !!}

{!! Assets::queue('stylesheet', 'global', 'global', '/assets/css/global.css') !!}


<?php
// include global pixels
// include custom pixels@include('theme::partials.pixels.custom')
?>

@include('theme::partials.pixels.global')

