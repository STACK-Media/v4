
@extends('theme::layouts.two_column')

@section('content')

	@if(@$page->video)

		@include('theme::partials.videoplayers.'.$page->player['player_name'], $page->player['player_data'])

	@endif

@stop