
@extends('theme::layouts.two_column')


@section('content')


<article>
	<div class="breadcrumb">
		<a href="http://www.stack.com/fitness/">
			Home
		</a>
		// 
		<a href="/fitness/category/fitness-2/" class="topic">
			Fitness
		</a>
		// 
		<a href="/fitness/yoga/" class="topic">
			Yoga
		</a>						
	</div>
	<h1>
		{!! $page->name !!}
	</h1>
	<p class="date">
		{!! date('F d, Y',strtotime($page->post_date)) !!}
	</p>

	<div id="trigger_slidebox">
	</div>
	<div class="article_content">
		
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

		
		<div class="topics">
			Topics: 
			<a href="/fitness/yoga/" class="topic">
				YOGA
			</a>
		</div>		

	</div>
	
</article>

@stop