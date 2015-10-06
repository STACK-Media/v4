
@extends('theme::layouts.two_column')

@section('content')


	<section class="tag">

		<div class="col-xs-12 dashed">
			<h1>{!! $page->name !!}</h1>
			<p class="small"><i>{!! $page->description !!}</i></p>
		</div>

		@if(@$page->player)

			@include('theme::partials.videoplayers.'.$page->player['player_name'], $page->player['player_data'])

			<div class="divider"></div>

		@endif

	</section>

@stop