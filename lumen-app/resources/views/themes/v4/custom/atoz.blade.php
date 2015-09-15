@extends('theme::layouts.two_column')

{!! Assets::queue('stylesheet', 'layout', 'atoz', '/assets/css/custom/atoz.css') !!}

@section('content')

	<section class="atoz">

		<h1>STACK's A to Z Guide</h1>

		@foreach ($tags AS $key => $value)

			<div class="col-xs-12 col-sm-4">
				<a href="#">{{$value->name}}</a>
			</div>

		@endforeach

	</section>


@stop