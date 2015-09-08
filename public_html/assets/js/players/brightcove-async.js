$(document).ready(function(){

	// don't build the player until the DOM has loaded
	build_player();

});

function build_player()
{
	// initialize variables
	var account 	= $(".video-js").data("account");
	var player 		= $(".video-js").data("player");

	// load brightcove js
	var s = document.createElement('script');
	s.src = "//players.brightcove.net/" + account + "/" + player + "_default/index.min.js";
	document.body.appendChild(s);

	// callback
	s.onload = _player_callback;
}

function _player_callback()
{
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
		play_video_by_id(video_id);
	});
}

// play video by id
function play_video_by_id(id,callback)
{
	// first we must pause current video 
	myPlayer.pause();
	
	// get video from brightcove catalog
	myPlayer.bcCatalog.getVideo(id,function(error,video){

		// run callback method
		callback(video);

		// play video
		myPlayer.src(video.sources);
		myPlayer.poster(video.poster);
		myPlayer.play();
	
	});

}

