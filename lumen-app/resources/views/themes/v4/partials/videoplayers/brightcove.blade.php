
{!! Assets::queue('stylesheet', 'brightcove', '/assets/widgets/css/brightcove.css') !!}

{!! Assets::queue('javascript', 'brightcove', '/assets/widgets/js/brightcove.js') !!}

<!-- Start of Brightcove Player -->
<script language="JavaScript" type="text/javascript" src="http://admin.brightcove.com/js/BrightcoveExperiences.js"></script>
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
<script type="text/javascript">brightcove.createExperiences();</script>
<!-- End of Brightcove Player -->