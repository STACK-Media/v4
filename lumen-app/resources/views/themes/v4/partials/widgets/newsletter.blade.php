@section('widget-styles')

	<link href="http://www.newsletter-widget-style.com/style.css" />

@append

@section('widget-queued-scripts')

	{{!! Assets::queue('javascript', 'newsletter-widget-style', 'http://www.newsletter-widget-style-widget-style.com/javascript.js?append-test') }}

@append

<div class="social">newsletter optin</div>