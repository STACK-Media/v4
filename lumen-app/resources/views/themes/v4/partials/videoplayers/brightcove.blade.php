{!! Assets::queue_raw('javascript', 'global', 	'brightcoveexternal', 	'//players.brightcove.net/1079349493/'.$player_id.'_default/index.min.js') !!}
{!! Assets::queue('stylesheet', 	'global', 	'brightcove', 			'/assets/css/players/brightcove.css') !!}
{!! Assets::queue('javascript', 	'global', 	'brightcove', 			'/assets/js/players/brightcove.js') !!}



<div class="outer">
	<video
		id 					= "{!! $player_key !!}"
		data-account		= "{!! $account_id !!}"
		data-player			= "{!! $player_id !!}"
		data-vid-id 		= "{!! $video_id !!}" 
		data-playlst-id		= "{!! $playlist_id !!}"
		data-embed			= "default"
		class 				= "video-js" 
		controls>
	</video>
</div>