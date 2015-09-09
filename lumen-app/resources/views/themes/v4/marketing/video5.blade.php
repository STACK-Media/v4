@extends('theme::layouts.marketing.two_column')

{!! Assets::queue('stylesheet', 'layout', 'article', '/assets/css/marketing/video5.css') !!}

@section('content')

	@if(@$page->player)

		@include('theme::partials.videoplayers.'.$page->player['player_name'], $page->player['player_data'])

	@endif

@stop