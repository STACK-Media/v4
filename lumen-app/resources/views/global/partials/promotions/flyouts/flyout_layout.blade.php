{!! Assets::queue_raw('javascript', 'global', 'flyout', '/assets/js/promotions/flyout.js') !!}
{!! Assets::queue_raw('stylesheet', 'global', 'flyout', '/assets/css/promotions/flyout.css') !!}

<div id="flyout">

	<span class="flyswat close">&times;</span>

	<a href="{!! $link !!}" target="_blank">
		<img src="{!! $img !!}" alt="{!! $alt !!}" />
	</a>

</div>