<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
<head>

	@include('theme::partials.head')

	@if(is_array(Assets::get('stylesheet')))


		{!! Minify::stylesheet(Assets::get('stylesheet'), array('foo' => 'bar')) !!}

		<?php /*
		@foreach(Assets::get('stylesheet') as $key => $sheet)

			<link rel="stylesheet" href="{{$sheet['src']}}">

		@endforeach
		*/ ?>

	@endif

</head>
<body>