{!! Assets::queue('stylesheet', 'global', 	'brightcove', 		'/assets/css/players/brightcove.css') !!}
{!! Assets::queue('javascript', 'global', 	'brightcove', 		'/assets/js/players/brightcove.js') !!}
<!--
{!! Assets::queue('javascript', 'globally', 'brightcove', 		'/assets/js/players/brightcove-async.js') !!}
{!! Assets::queue('javascript', 'global', 'brightcove-player', 	'//players.brightcove.net/<?php echo $account_id; ?>/<?php echo $player_id; ?>_default/index.min.js') !!}
{!! Assets::queue('javascript', 'global', 'brightcove-video-js','//players.brightcove.net/<?php echo $account_id; ?>/<?php echo $player_id; ?>_default/node_modules/video.js/dist/video-js/video.js') !!}
-->

<div class="outer">
	<video
		id 				= "{!! $player_key !!}"
		data-account	= "{!! $account_id !!}"
		data-player		= "{!! $player_id !!}"
		data-video-id 	= "{!! $video_id !!}" 
		data-embed		= "default"
		class 			= "video-js" 
		controls>
	</video>
</div>
<!-- Brightcove Javascript --
<script src="//players.brightcove.net/1079349493/<?php echo $player_id; ?>_default/node_modules/video.js/dist/video-js/video.js"></script>
-->
<script src="//players.brightcove.net/1079349493/<?php echo $player_id; ?>_default/index.min.js"></script>

