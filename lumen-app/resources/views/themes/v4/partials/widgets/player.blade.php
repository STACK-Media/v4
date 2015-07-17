

@if(view()->exists('theme::partials.videoplayers.'.$player_name))

	@include('theme::partials.videoplayers.'.$player_name, $video_data)

@endif