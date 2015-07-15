{!! Assets::queue('stylesheet', 'player', '/assets/widgets/css/player.css') !!}

{!! Assets::queue('javascript', 'player', '/assets/widgets/js/player.js') !!}


@if(view()->exists('theme::partials.players.'.$player_name))

	@include('theme::partials.players.'.$player_name, $video_data)

@endif

{!! Assets::queue('javascript', 'player', '/assets/widgets/js/player.js') !!}