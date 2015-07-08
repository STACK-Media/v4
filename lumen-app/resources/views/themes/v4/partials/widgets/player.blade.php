@section('widget-styles')

	<link href="http://www.player-widget-style.com/style.css" />

@append

@section('widget-queued-scripts')

	{{!! Assets::queue('javascript', 'player-widget-style', 'http://www.player-widget-style-widget-style.com/javascript.js?append-test') }}

@append


<div class="player">video player</div>