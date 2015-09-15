

$('#intropop').modal();

setTimeout(function(){

	if (typeof myPlayer !== "undefined" && typeof myPlayer.pause === "function") {

		myPlayer.pause();

	}else{

		alert('ugh');

	}

}, 300);

