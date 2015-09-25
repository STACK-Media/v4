@extends('theme::layouts.marketing.one_column')

{!! Assets::queue('stylesheet', 'marketing', 'video32', '/assets/css/marketing/video32.css') !!}

@section('content')

	<div class="video32">

		<div class="col-xs-12 col-md-8 col-lg-8">

			@if(@$page->player)

				@include('theme::partials.videoplayers.'.$page->player['player_name'], $page->player['player_data'])

			@endif

		</div>

		<div class="col-xs-12 col-md-4 col-lg-4 thumbnails">

			@foreach($page->playlist['videos'] as $key => $value)

				<?php $class = ($key < 3) ? '': 'hidden'; ?>

				<div class="{{$class}} col-xs-12 block">

					<a href="#">
						<div class="col-xs-6">
							@include('theme::partials.img',
								array(
									'src' 	=> $value['videoStillURL'], 
									'alt' 	=> $value['name'],
									'class'	=> 'img-responsive'
								)
							)
						</div>
						<div class="col-xs-6">
							<h3>{{$value['name']}}</h3>
							<p class="views">Views: {{$value['playsTotal']}}</p>
						</div>
					</a>

				</div>

			@endforeach

		</div>

	</div>

@stop

@section('content-widgets')

	<div class="title_container">
		<div class="left">
		    <div class="title">
		        <h3 class="video-title">{!! $page->playlist['videos'][0]['name'] !!}</h3>
		        <p class="video-description">{!! $page->playlist['videos'][0]['shortDescription'] !!}</p>
		    </div>
		    <div class="social-addthis"></div>
		</div>
	</div>

@stop

