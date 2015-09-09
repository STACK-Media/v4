@extends('theme::layouts.marketing.one_column')


@section('content')

	<div class="col-xs-12 col-md-8 col-lg-8">

		@if(@$page->player)

			@include('theme::partials.videoplayers.'.$page->player['player_name'], $page->player['player_data'])

		@endif

	</div>

	<div class="col-xs-12 col-md-4 col-lg-4">

		this is where the thumbnails go

	</div>

@stop