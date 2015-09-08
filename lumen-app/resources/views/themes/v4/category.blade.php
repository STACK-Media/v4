
@extends('theme::layouts.two_column')

@section('content')

	<div>

		<h1>{!! $page->name !!}</h1>
		<p>{!! $page->description !!}</p>

		@if(@$page->player)

			@include('theme::partials.videoplayers.'.$page->player['player_name'], $page->player['player_data'])

		@endif

	</div>

@stop