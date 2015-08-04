{!! Assets::queue('stylesheet', 'global', 'oas', '/assets/css/oasbanner.css') !!}

@include('theme::partials.adproviders.'.config('banners.provider'), array('width' => $width, 'height' => $height, 'args' => (isset($args) ? $args : array())))