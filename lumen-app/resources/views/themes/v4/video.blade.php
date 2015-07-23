
@extends('theme::layouts.two_column')

@section('content-widgets')

	@include('theme::partials.videoplayers.'.$page->video['player_name'], $page->video['video_data'])

@stop