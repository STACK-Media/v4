{!! Assets::queue('stylesheet', 'player', '/assets/widgets/css/player.css') !!}

{!! Assets::queue('javascript', 'player', '/assets/widgets/js/player.js') !!}


@if(view()->exists('theme::partials.videoplayers.'.$player_name))

	@include('theme::partials.videoplayers.'.$player_name, $video_data)

@endif

{!! Assets::queue('javascript', 'player', '/assets/widgets/js/player.js') !!}