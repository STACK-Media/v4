{!! Assets::queue('javascript', 'layout', 'oas', '/assets/js/oasbanner.js') !!}
{!! Assets::queue('stylesheet', 'layout', 'oas', '/assets/css/oasbanner.css') !!}

<div id="oas_{!! $args['name'] !!}" class="oasbanner oasbanner_w{!! $width !!} oasbanner_h{!! $height !!}" data-banner="{!! $args['name'] !!}" data-banner-w="{!! $width !!}" data-banner-h="{!! $height !!}"></div>
