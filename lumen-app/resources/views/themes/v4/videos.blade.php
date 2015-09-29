
@extends('theme::layouts.one_column')

@section('content')

	@include('theme::partials.videoplayers.'.$page->player['player_name'], $page->player['player_data'])

	<?php
	if (is_array($page->playlist['videos'])):
	?>

		@foreach ($page->playlist['videos'] AS $key => $value)

			<?php
			print "<pre>";
			print_r($value);
			print "</pre>";
			?>

		@endforeach

	<?php
	endif;
	?>

	<div class="row">

		<div class="col-xs-12">
			
			<h2>Related Videos</h2>

			<div class="OUTBRAIN" data-src="http://www.stack.com/video/1277358638001/developing-lowerbody-power-in-the-adipure-trainer/" data-widget-id="VR_2" data-ob-template="stack" ></div>
			<script type="text/javascript" async="async" src="http://widgets.outbrain.com/outbrain.js"></script>
		</div>

		<div class="clearfix"></div>	

	</div>

@stop