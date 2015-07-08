@section('widget-styles')

	<link href="http://www.article-widget-style.com/style.css" />

@append

@section('widget-queued-scripts')

	{{!! Assets::queue('javascript', 'article-widget-style', 'http://www.article-widget-style-widget-style.com/javascript.js?append-test') }}

@append

<div class="spacer"></div>
<div class="article">article content</div>
<hr />
<div class="spacer"></div>