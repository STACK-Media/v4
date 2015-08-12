{!! Assets::queue('javascript', 'layout', 'oas', '/assets/js/oasbanner.js') !!}
{!! Assets::queue('stylesheet', 'layout', 'oas', '/assets/css/oasbanner.css') !!}

<?php

if ( ! config('OAS.positions')):

	app()->configure('OAS'); // dont like loading a config in a view but nowhere else ot compartmentalize it

endif;

$banner = config('OAS.positions.'.$position);

?>

@if(isset($banner['desktop']['name']) && $banner['desktop']['name'])

	<div id="oas_{!! $banner['desktop']['name'] !!}" class="oas oas_dw{!! $banner['desktop']['width'] !!} oas_dh{!! $banner['desktop']['height'] !!}" data-oas-d="{!! $banner['desktop']['name'] !!}" data-oas-w="{!! $banner['desktop']['width'] !!}" data-oas-h="{!! $banner['desktop']['height'] !!}"></div>

@endif

@if(isset($banner['mobile']['name']) && $banner['mobile']['name'])

	<div id="oas_{!! $banner['mobile']['name'] !!}" class="oas oas_mw{!! $banner['mobile']['width'] !!} oas_mh{!! $banner['mobile']['height'] !!}" data-oas-m="{!! $banner['mobile']['name'] !!}" data-oas-w="{!! $banner['mobile']['width'] !!}" data-oas-h="{!! $banner['mobile']['height'] !!}"></div>

@endif