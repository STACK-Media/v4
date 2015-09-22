@extends('theme::layouts.marketing.three_column')

{!! Assets::queue('stylesheet', 'marketing', 'video36', '/assets/css/marketing/video36.css') !!}
{!! Assets::queue('javascript', 'marketing', 'video36', '/assets/js/marketing/video36.js') !!}

@section('content')

	@if(@$page->player)

		@include('theme::partials.videoplayers.'.$page->player['player_name'], $page->player['player_data'])

	@endif

@stop

@section('post-content-widgets')

	<div class="row playlist">

		@foreach ($page->playlist['videos'] AS $key => $value)

			<?php
			// determine if this is the current video being player
			$class 	= ($page->player['player_data']['video_id'] == $value['id'])? 'nowplaying': '';
			?>

			<div class="col-xs-12 col-sm-4">

				<a href="#" class="play-video {{$class}}" data-id="{{$value['id']}}">
					@include('theme::partials.img',
						array(
							'src' 	=> $value['videoStillURL'], 
							'alt' 	=> $value['name'],
							'class'	=> 'img-responsive'
						)
					)
				</a>
				<p>{{$value['name']}}</p>

			</div>

		@endforeach

	</div>

@stop
