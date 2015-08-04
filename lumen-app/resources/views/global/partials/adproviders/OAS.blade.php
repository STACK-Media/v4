{!! Assets::queue('javascript', 'global', 'oas', '/assets/js/oasbanner.js') !!}
{!! Assets::queue('stylesheet', 'global', 'oas', '/assets/css/oasbanner.css') !!}

<div id="oas_{!! $args['name'] !!}" data-banner="{!! $args['name'] !!}" data-banner-w="{!! $width !!}" data-banner-h="{!! $height !!}"></div>
