@section('widget-styles')

	<link href="http://www.outbrain-sidebar-widget-style.com/style.css" />

@append

@section('widget-queued-scripts')

	{{!! Assets::queue('javascript', 'outbrain-sidebar-widget-style', 'http://www.outbrain-sidebar-widget-style-widget-style.com/javascript.js?append-test') }}

@append

<div class="row">

	<div class="col-xs-12">
		
		<h3>Recommended</h3>
	
		<div class="outbrain-sidebar">outbrain</div>

	</div>

</div>