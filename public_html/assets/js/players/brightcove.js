(function ($, window) {

	"use strict";

	// initialize variables
	var player_key 	= $(".video-js").attr("id");
	var video_id 	= $(".video-js").data("video-id");

	var myPlayer 	= videojs(player_key);	// the video player object

	// on ready
	myPlayer.ready(function(data){

		// initialize variables
		var myPlayer 	= this;

		// initialize ads 
		//myPlayer.ads();

		// set event listeners 
		//myPlayer.on("play",myPlayer.onPlay);
		//myPlayer.on("ended",myPlayer.onEnded);

		// load first video 
		loadVideo(video_id);
	});


	// load specific video
	function loadVideo(id)
	{
		// first we must pause current video 
		myPlayer.pause();
		
		// get video from brightcove catalog
		myPlayer.bcCatalog.getVideo(id,function(error,video){

			// play video
			myPlayer.src(video.sources);
			myPlayer.poster(video.poster);
			myPlayer.play();
		});

		//changeOverlay(id);
	}

})(window.jQuery, window);