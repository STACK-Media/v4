<?php /*
@section('widget-styles')

	<link href="http://www.recommended-widget-style.com/style.css" />

@append
*/ ?>


@section('widget-array-js')

	<?php 

	\App\Models\TestHTML::queue('javascript', 'recommended', 'http://www.recommended-widget-style.com/javascript.js?array-test');

	$widget_scripts['key'] = 'http://www.recommended-widget-style.com/javascript.js?array-test'; ?>
	
	overwrite? {{ count($widget_scripts) }}

@append

<?php /*
@section('widget-scripts')

	<script type="text/javascript" src="http://www.recommended-widget-style.com/javascript.js"></script>

@append
*/ ?>

<div class="row">

	<div class="col-xs-12">
		
		<h1>Latest Articles by Sara Haas</h1>
	
	</div>

</div>

<div class="row">

	<div class="col-sm-4">

		<h3>More About Lifestyle</h3>

		<ul>
			<li><a href="#">3 Tips to Eat Healthy on a Budget</a></li>
			<li><a href="#">3 Tips to Eat Healthy on a Budget</a></li>
			<li><a href="#">3 Tips to Eat Healthy on a Budget</a></li>
			<li><a href="#">3 Tips to Eat Healthy on a Budget</a></li>
			<li><a href="#">3 Tips to Eat Healthy on a Budget</a></li>
		</ul>

	</div>

	<div class="col-sm-4">

		<h3>More About Football</h3>

		<ul>
			<li><a href="#">3 Tips to Eat Healthy on a Budget</a></li>
			<li><a href="#">3 Tips to Eat Healthy on a Budget</a></li>
			<li><a href="#">3 Tips to Eat Healthy on a Budget</a></li>
			<li><a href="#">3 Tips to Eat Healthy on a Budget</a></li>
			<li><a href="#">3 Tips to Eat Healthy on a Budget</a></li>
		</ul>

	</div>

	<div class="col-sm-4">

		<h3>Other Great Videos</h3>

		<ul>
			<li><a href="#">3 Tips to Eat Healthy on a Budget</a></li>
			<li><a href="#">3 Tips to Eat Healthy on a Budget</a></li>
			<li><a href="#">3 Tips to Eat Healthy on a Budget</a></li>
			<li><a href="#">3 Tips to Eat Healthy on a Budget</a></li>
			<li><a href="#">3 Tips to Eat Healthy on a Budget</a></li>
		</ul>

	</div>

</div>

<div class="spacer"></div>
