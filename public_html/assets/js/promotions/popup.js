

$('#intropop').modal();

setTimeout(function(){

	if (typeof myPlayer !== "undefined" && typeof myPlayer.pause === "function") {

		myPlayer.pause();

	}

}, 300);


$('#intropop').on('hidden.bs.modal', function (e) {

	if (typeof myPlayer !== "undefined" && typeof myPlayer.play === "function") {

		myPlayer.play();

	}

})