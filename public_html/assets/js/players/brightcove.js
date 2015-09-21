// initialize variables
var myPlayer = {};
var player_key 	= $(".video-js").attr("id");
var video_id 	= $(".video-js").data("video-id");

$(document).ready(function(){

	// initialize player object
	myPlayer 	= videojs(player_key);	// the video player object

	// on ready
	myPlayer.ready(function(data){

		// initialize variables
		var myPlayer 	= this;

		// initialize ads 
		//myPlayer.ads();

		// set event listeners 
		//myPlayer.on("play",myPlayer.onPlay);
		myPlayer.on("ended",onMediaComplete);

		// load first video 
		play(video_id);
	});

	// onclick of new video
	$(".play-video").on('click',function(){

		// initialize variables
		var video_id 	= $(this).data('id');

		// play new video
		play(video_id);

	});

});

// load specific video
function play(id)
{
	// first we must pause current video 
	myPlayer.pause();
	
	// get video from brightcove catalog
	myPlayer.bcCatalog.getVideo(id,function(error,video){

		// play video
		myPlayer.src(video.sources);
		myPlayer.poster(video.poster);
		myPlayer.play();

		if ($('.modal').is(':visible')){
			myPlayer.pause();
		}
	});		

	nowplaying(id);
}

function nowplaying(id)
{
	// remove all nowplaying classes
	// iterate all videos available to play
	$(".play-video").each(function(){
		$(this).removeClass('nowplaying');
	});

	// add nowplaying class to proper video
	$(".play-video[data-id='" + id + "']").addClass('nowplaying');
}

function onMediaComplete()
{
	// initialize variables
	var toplay 	= false;

	// iterate all videos available to play
	$(".play-video").each(function(){

		// initialize variables
		var video_id 	= $(this).data('id');

		// if we need to play this video, then lets do that
		if (toplay)
		{
			play(video_id);
			return false;
		}

		// if this is the nowplaying video, then we need to grab thenext video_id to play
		if ($(this).hasClass('nowplaying'))
		{
			toplay 	= true;
		}

	});

	// if we made it here, then there wasn't a video found to play
	return false;

}



