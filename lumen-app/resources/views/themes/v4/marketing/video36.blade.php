@extends('theme::layouts.marketing.three_column')

{!! Assets::queue('stylesheet', 'marketing', 'video36', '/assets/css/marketing/video36.css') !!}
{!! Assets::queue('javascript', 'marketing', 'video36', '/assets/js/marketing/video36.js') !!}

@section('content')

	@if(@$page->player)

		@include('theme::partials.videoplayers.'.$page->player['player_name'], $page->player['player_data'])

	@endif

	<div class="row playlist headroom">

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
				<p><b>{{$value['name']}}</b><br><span class="video36-video-plays">Views: <?php echo number_format($value['playsTotal'],0,'.',','); ?></span></p>

			</div>

		@endforeach

	</div>

@stop


@section('left-sidebar-widgets')

	<div class="row">

		@include('theme::partials.bannerad', array('position' => 'sidebar-topleft', 'args' => array()))

		<div class="col-xs-12">

			<h3 class="video36-title">
				Most Popular Videos
			</h3>

			<ul class="video36-videos">

				<li><a href="#true_top" class="play-video" data-id="4234780710001">James Harrison Performs 215-Pound Weighted Dips and 800-Pound Deadlift</a></li>
				<li><a href="#true_top" class="play-video" data-id="4247134863001">Shawn Oakman Lands a 40-Inch Box Jump With 140 Pounds</a></li>
				<li><a href="#true_top" class="play-video" data-id="4251721839001">WWE Star John Cena's Full-Range-of-Motion 600-Plus-Pound Squat</a></li>
				<li><a href="#true_top" class="play-video" data-id="4101690918001">Marcus Mariota: Speed is Key</a></li>
				<li><a href="#true_top" class="play-video" data-id="4328363719001">Aaron Rodgers is Now Pretending He's in X-Men to Train For Next Season</a></li>
				<li><a href="#true_top" class="play-video" data-id="4204546273001">Lorenzo Mauldin: Never Forget the Past</a></li>
				<li><a href="#true_top" class="play-video" data-id="4204497850001">Basketball Comes Easy For James Harden</a></li>
				<li><a href="#true_top" class="play-video" data-id="4283320333001">NFL Cornerback Joe Haden Still Believes in the Cleveland Cavaliers</a></li>
				<li><a href="#true_top" class="play-video" data-id="4251830983001">J.R. Smith Throws Down Sick Reverse Alley-oop From Shumpert</a></li>

			</ul>

		</div>

		@include('theme::partials.bannerad', array('position' => 'sidebar-bottom', 'args' => array()))

	</div>

@stop

@section('right-sidebar-widgets')

	<div class="row">

		@include('theme::partials.bannerad', array('position' => 'sidebar-top', 'args' => array()))

		<div class="col-xs-12">

			<h3 class="video36-title">
				Must See Videos
			</h3>

			<ul class="video36-videos">

				<li><a href="#true_top" class="play-video" data-id="4204497852001">Why Mevin Gordon is NFL Ready</a></li>
				<li><a href="#true_top" class="play-video" data-id="4204526806001">Football is Danny Shelton's Outlet</a></li>
				<li><a href="#true_top" class="play-video" data-id="4187042750001">Jordan Kilganon Sets World Record With 75-Inch Box Jump</a></li>
				<li><a href="#true_top" class="play-video" data-id="4204546271001">How Ricky Rubio Keeps Getting Better</a></li>
				<li><a href="#true_top" class="play-video" data-id="4204546272001">Kasan Williams 'Wins the Day'</a></li>
				<li><a href="#true_top" class="play-video" data-id="4204465974001">Shaq Thompson's Guide to Overcoming Failure</a></li>
				<li><a href="#true_top" class="play-video" data-id="4204465972001">How Tim Shaw Stays Positive While Battling ALS</a></li>
				<li><a href="#true_top" class="play-video" data-id="4204526804001">Trae Waynes on Reaching His NFL Dream</a></li>
				<li><a href="#true_top" class="play-video" data-id="4204465968001">Tim Tebow: It's All About the Work Eithic</a></li>
				<li><a href="#true_top" class="play-video" data-id="4204497848001">Skylar Diggins on Why the WNBA Deserves Your Attention</a></li>

			</ul>

		</div>

		@include('theme::partials.bannerad', array('position' => 'sidebar-mid', 'args' => array()))

	</div>

@stop

@section('post-content-widgets')
	
	@include('theme::partials.bannerad', array('position' => 'leader-bottom', 'args' => array()))

@stop
