{!! Assets::queue('javascript', 'layout', 'dfp', '/assets/js/dfpbanner.js') !!}
{!! Assets::queue('stylesheet', 'layout', 'oas', '/assets/css/dfpbanner.css') !!}

<?php

/*
networkCode    = '19565616',
	topLevelAdUnit = "stack",
	s1             = "media", // homepage, article, video, landing, etc..
	adUnit         = topLevelAdUnit + "." + s1,
	slotName       = "/" + networkCode + "/" + adUnit,
	url            = page_info.url, // add full URL
	article        = "",

googletag.pubads().setTargeting("s1",		s1);
	googletag.pubads().setTargeting("url",		url);
	googletag.pubads().setTargeting("kw",		adcats);
	googletag.pubads().setTargeting("article",	article);
 */

if ( ! config('DFP.positions')):

	app()->configure('DFP'); // dont like loading a config in a view but nowhere else ot compartmentalize it

endif;

$banner = config('DFP.positions.'.$position);

?>

@if(isset($banner['desktop']['name']) && $banner['desktop']['name'])

	<?php /*
	<div class="desktop-adunit" data-adunit="{!! $banner['desktop']['name'] !!}" data-dimensions="{!! $banner['desktop']['width'] !!}x{!! $banner['desktop']['height'] !!}"></div>
	*/ ?>

	<div class="desktop-adunit" data-adunit="stack.media" data-adspot="{!! $banner['desktop']['name'] !!}" data-dimensions="{!! $banner['desktop']['width'] !!}x{!! $banner['desktop']['height'] !!}"></div>

@endif

@if(isset($banner['mobile']['name']) && $banner['mobile']['name'])
	
	<?php /*
	<div class="mobile-adunit" data-adunit="{!! $banner['mobile']['name'] !!}" data-dimensions="{!! $banner['mobile']['width'] !!}x{!! $banner['mobile']['height'] !!}"></div>
	*/ ?>

	<div class="mobile-adunit" data-adunit="stack.media" data-adspot="{!! $banner['desktop']['name'] !!}" data-dimensions="{!! $banner['mobile']['width'] !!}x{!! $banner['mobile']['height'] !!}"></div>

@endif
