@section('widget-styles')

	<link href="http://www.must-see-widget-style.com/style.css" />

@append

@section('widget-queued-scripts')

	{{!! Assets::queue('javascript', 'must-see-widget-style', 'http://www.must-see-widget-style-widget-style.com/javascript.js?append-test') }}

@append

<div class="row">

	<div class="col-xs-12">
		
		<h1>Must See</h1>
	
	</div>

</div>

<div class="row">

	<div class="col-sm-4">

		<div class="img-block"></div>

		<p><a href="#">Derrick Rose Explains How He Stays Positive</a></p>
		<p class="views">Views: 4,766,900</p>

	</div>

	<div class="col-sm-4">

		<div class="img-block"></div>

		<p><a href="#">Dwight Howard Stays in the Gym All Night</a></p>
		<p class="views">Views: 4,766,900</p>

	</div>

	<div class="col-sm-4">

		<div class="img-block"></div>

		<p><a href="#">Roy Hibbert 540 Lbs Deadlift</a></p>
		<p class="views">Views: 4,766,900</p>

	</div>	

</div>

<div class="spacer"></div>
