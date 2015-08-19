{!! Assets::queue('javascript', 'layout', 'dfp', '/assets/js/dfpbanner.js') !!}
{!! Assets::queue('stylesheet', 'layout', 'oas', '/assets/css/dfpbanner.css') !!}

<?php

if ( ! config('DFP.positions')):

	app()->configure('DFP'); // dont like loading a config in a view but nowhere else ot compartmentalize it

endif;

$banner = config('DFP.positions.'.$position);

?>

@if(isset($banner['desktop']['name']) && $banner['desktop']['name'])

	<div class="desktop-adunit" data-adunit="stack.media" data-adspot="{!! $banner['desktop']['name'] !!}" data-dimensions="{!! $banner['desktop']['width'] !!}x{!! $banner['desktop']['height'] !!}"></div>

@endif

@if(isset($banner['mobile']['name']) && $banner['mobile']['name'])

	<div class="mobile-adunit" data-adunit="stack.media" data-adspot="{!! $banner['desktop']['name'] !!}" data-dimensions="{!! $banner['mobile']['width'] !!}x{!! $banner['mobile']['height'] !!}"></div>

@endif
