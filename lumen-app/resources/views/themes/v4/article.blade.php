
@extends('theme::layouts.two_column')


@section('content')


<article>

	<?php // need to add vertical stuff to breadcrumb links ?>

	<div id="breadcrumb">

		<a href="/">
			Home
		</a>
		
		@foreach($page->taxonomy['category'] as $category)
		//
		<a href="/category/{!! $category->slug !!}">
			{!! $category->name !!}
		</a>

		@endforeach

	</div>

	<h1>
		{!! $page->name !!}
	</h1>
	
	<time datetime="{!! date('Y-m-d H:i',strtotime($page->post_date)) !!}">{!! date('F d, Y',strtotime($page->post_date)) !!}</time>
	
	<?php /*
	<div id="trigger_slidebox">
	</div>
	*/ ?>

	<div id="article_content">

		@if($page->video)
	
			@include('theme::partials.videoplayers.'.$page->video['player_name'], $page->video['video_data']);

		@endif
		
		<?php /*
		<div class="video playlist">
			<div id="BCLbodyContent">
				<div id="BCLcontainingBlock">
					<div class="BCLvideoWrapper">
						<div>

						</div> 
					</div>
				</div>
			</div>
			<div class="playlist_container">
				<a class="previous_video" href="">
				</a>
				<fieldset>
					<p id="mediaLegend">
						Now Playing
					</p>
					<div id="mediaInfo">
						<a href="#">
							Yoga Fails, Fixed: Low Lunge
						</a>
					</div>
					<div id="mediaDescription">
						Get expert advice about the Low Lunge Pose and how to fix common mistakes while performing it.
					</div>
					<div>
						<div id="videoViews">
						</div>
					</div>

				</fieldset>
				<a id="NextVideo" href="">
					Next Video: Yoga Fails, Fixed:  Warrior II
				</a>
				<a class="next_video" href="">
				</a>
			</div>
		</div>
		*/ ?>

		{!! $page->post_content !!}

		<?php /*
		<div class="topics">
			Topics: 
			<a href="/fitness/yoga/" class="topic">
				YOGA
			</a>
		</div>
		*/ ?>

	</div>
	
</article>

@stop