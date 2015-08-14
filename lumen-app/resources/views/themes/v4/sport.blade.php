
@extends('theme::layouts.two_column')

@section('content')

	<article>

		<h1>{!! $page->name !!}</h1>
		<p><i>category description goes here</i></p>

		@if(@$page->video)

			@include('theme::partials.videoplayers.'.$page->player['player_name'], $page->player['player_data'])

		@endif

	</article>

@stop