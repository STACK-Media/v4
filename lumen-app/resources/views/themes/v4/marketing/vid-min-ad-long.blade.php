@extends('theme::layouts.marketing.one_column')

{!! Assets::queue('stylesheet', 'marketing', 'vid-min-ad-long', '/assets/css/marketing/vid-min-ad-long.css') !!}

@section('content')

	<div class="vid-min-ad-long">

		<div class="col-xs-12 col-md-8 col-lg-8">

			<div class="media-block">
				<div class="video-title bigger"></div>
			</div>
			
			@if(@$page->player)

				<div class="video-player">
					@include('theme::partials.videoplayers.'.$page->player['player_name'], $page->player['player_data'])
				</div>

			@endif

			<div class="media-block">
				<div class="video-title"></div>
				<div class="video-description"></div>
			</div>
			
		</div>

		<div class="col-xs-12 col-md-4">

			<section>
				<iframe src="http://www.stack.com/includes/sidebar_video.php?playlist=<?php echo $page->playlist['videos'][0]['id']; ?>" width="300" height="350" frameBorder="0" style="overflow:hidden;margin-bottom:3px;" scrolling="no"></iframe>
			</section>

			@include('theme::partials.bannerad', array('position' => 'sidebar-top', 'args' => array()))

		</div>

	</div>

@stop

@section('post-content-widgets')

	<div class="row playlist headroom vid-min-ad-long">

		@foreach ($page->playlist['videos'] AS $key => $value)

			<?php
			// determine if this is the current video being player
			$class 	= ($page->player['player_data']['video_id'] == $value['id'])? 'nowplaying': '';
			?>

			<div class="col-xs-12 col-sm-4">

				<a href="#true_top" class="play-video {{$class}}" data-id="{{$value['id']}}">
					@include('theme::partials.img',
						array(
							'src' 	=> $value['videoStillURL'], 
							'alt' 	=> $value['name'],
							'class'	=> 'img-responsive'
						)
					)
				</a>
				<p><b>{{$value['name']}}</b><br><span class="views">Views: <?php echo number_format($value['playsTotal'],0,'.',','); ?></span></p>

			</div>

		@endforeach

	</div>

@stop

