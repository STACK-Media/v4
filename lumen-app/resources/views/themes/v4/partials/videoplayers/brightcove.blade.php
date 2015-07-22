
{!! Assets::queue('stylesheet', 'global', 'brightcove', '/assets/widgets/css/brightcove.css') !!}

{!! Assets::queue('javascript', 'global', 'brightcove', '/assets/widgets/js/brightcove.js') !!}

{!! Assets::queue('javascript', 'global', 'bcexperiences', '//admin.brightcove.com/js/BrightcoveExperiences.js') !!}



    <div class="bcove-outer-container">

		<object id="myExperienceMediaPlayer" class="BrightcoveExperience">
			<param name="bgcolor" value="#FFFFFF" />
			<param name="width" value="692" />
			<param name="height" value="389" />
			<param name="playerID" value="{!! $player_id !!}" />
			<param name="playerKey" value="{!! $player_key !!}" />
			<param name="@videoPlayer" value="{!! $video_id !!}" />
			<param name="isVid" value="true" />
			<param name="isUI" value="true" />
			<param name="autoStart" value="true" />
			<param name="dynamicStreaming" value="true" />
			<param name="includeAPI" value="true" />
			<param name="templateLoadHandler" value="onTemplateLoaded" />
			<param name="templateReadyHandler" value="onTemplateReady" />										  
		</object>

	</div>


<?php /*
<script type="text/javascript">brightcove.createExperiences();</script>
*/ ?>
<!-- End of Brightcove Player -->