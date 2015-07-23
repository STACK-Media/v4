
@extends('theme::layouts.two_column')

@section('content-widgets')

	@include('theme::partials.videoplayers.'.$page->player['player_name'], $page->player['player_data'])

@stop