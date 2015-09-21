@extends('theme::layouts.marketing.two_column')

{!! Assets::queue('stylesheet', 'layout', 'article', '/assets/css/marketing/video5.css') !!}

@section('content')

	@if(@$page->player)

		@include('theme::partials.videoplayers.'.$page->player['player_name'], $page->player['player_data'])

	@endif

@stop

@section('post-content-widgets')

	<div class="row playlist">

		@foreach ($page->playlist['videos'] AS $key => $value)

			<div class="col-xs-12 col-sm-4">

				@include('theme::partials.img',
					array(
						'src' 	=> $value['videoStillURL'], 
						'alt' 	=> $value['name'],
						'class'	=> 'img-responsive'
					)
				)
				<p>{{$value['name']}}</p>

			</div>

		@endforeach

	</div>

@stop