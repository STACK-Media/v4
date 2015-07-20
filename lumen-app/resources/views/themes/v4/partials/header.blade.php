<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
<head>

	@include('theme::partials.head')

	{!! Assets::get_queued('stylesheet') !!} 

	@if(is_array(Assets::get_queued_raw('stylesheet')))

		@foreach (Assets::get_queued_raw('stylesheet') as $key => $arr)

			<?php

			// yes.. mixing PHP and blade, but
			// wanted to reduce whitespace in attributes
			// between blade control tags

			$attribs = array();

			if (isset($arr['custom']) && is_array($arr['custom'])):

				foreach ($arr['custom'] as $key => $val):

					$attribs[] = $key . '="' . $val . '"';

				endforeach;

			endif;

			?>

			<link href="{!! $arr['src'] !!}" rel="stylesheet" {!! implode(' ', $attribs) !!}>

		@endforeach

	@endif

</head>
<body>