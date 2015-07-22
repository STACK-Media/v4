<?php /*
{!! Assets::queue('stylesheet', 'widgets', 'player', '/assets/css/widgets/player.css') !!}

{!! Assets::queue('javascript', 'widgets', 'player', '/assets/js/widgets/player.js') !!}
*/ ?>


@if(view()->exists('theme::partials.videoplayers.'.$player_name))

	@include('theme::partials.videoplayers.'.$player_name, $video_data)

@endif

<?php /*
{!! Assets::queue('javascript', 'player', '/assets/js/widgets/player.js') !!}
*/