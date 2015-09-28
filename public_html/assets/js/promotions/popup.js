

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

	var 
		group = $('#intropop').data('promoGroup'),
		promo = $('#intropop').data('promoName');

	$.cookie('pr_nocre_'+group+'_'+promo, '1',  { path: '/', expires: 1 });

});