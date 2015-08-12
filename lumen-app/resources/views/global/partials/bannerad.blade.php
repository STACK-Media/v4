{!! Assets::queue('stylesheet', 'global', 'oas', '/assets/css/oasbanner.css') !!}

@include('theme::partials.adproviders.'.config('banners.provider'), array('position' => $position, 'args' => (isset($args) ? $args : array())))