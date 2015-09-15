@extends('theme::layouts.two_column')

{!! Assets::queue('stylesheet', 'layout', 'atoz', '/assets/css/custom/atoz.css') !!}

@section('content')

	<section class="atoz">

		<h1>STACK's A to Z Guide</h1>

		@foreach ($taxonomies AS $key => $value)

			<?php
			// update for routelink
			if ($value->taxonomy == 'post_tag')
				$value->taxonomy 	= 'tag';
			?>

			<div class="col-xs-12 col-sm-4">
				<a href="{!! routelink($value->taxonomy, array('slug' => $value->slug)) !!}">{{$value->name}}</a>
			</div>

		@endforeach

	</section>


@stop