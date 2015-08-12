{!! Assets::queue('javascript', 'layout', 'oas', '/assets/js/oasbanner.js') !!}
{!! Assets::queue('stylesheet', 'layout', 'oas', '/assets/css/oasbanner.css') !!}

<?php

app()->configure('OAS');
$banner = config('oas.positions.'.$position);

var_dump($banner);

/*
?>

<div id="oas_{!! $args['name'] !!}" class="oas oas_dw{!! $banner['desktop']['width'] !!} oas_dh{!! $banner['desktop']['height'] !!} oas_mw{!! $banner['mobile']['width'] !!} oas_mh{!! $banner['mobile']['height'] !!}" data-oas-d="{!! $banner['desktop']['name'] !!}" data-oas-dw="{!! $banner['desktop']['width'] !!}" data-oas-dh="{!! $banner['desktop']['height'] !!}" data-oas-m="{!! $banner['mobile']['name'] !!}" data-oas-mw="{!! $banner['mobile']['width'] !!}" data-oas-mh="{!! $banner['mobile']['height'] !!}"></div>
<?php */