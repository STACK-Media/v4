{!! Assets::queue('stylesheet', 'player', '/assets/css/widgets/player.css') !!}

{!! Assets::queue('javascript', 'player', '/assets/js/widgets/player.js') !!}


{!! Assets::queue('stylesheet', 'testing', Assets::themed('css/testing_themepath.css')) !!}

@if(view()->exists('theme::partials.videoplayers.'.$player_name))

	@include('theme::partials.videoplayers.'.$player_name, $video_data)

@endif

{!! Assets::queue('javascript', 'player', '/assets/js/widgets/player.js') !!}