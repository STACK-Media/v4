

function firepop($elem){

	if ($elem.length < 1){
		return;
	}

	$elem.modal();

	setTimeout(function(){

		if (typeof myPlayer !== "undefined" && typeof myPlayer.pause === "function") {

			myPlayer.pause();

		}

	}, 300);

}


firepop($('#intropop'));

var 
	exitpopped = 0,
	showpop    = 0,
	delay      = 1000,
	mouseposY  = null,
	threshold  = 25,
	popposY    = null,
	thinking   = null;

setTimeout(function(){showpop = 1;}, delay);

$(document).mousemove(function(e){

	mouseposY = e.clientY;

	if(mouseposY < threshold && exitpopped == 0 && showpop == 1 && ! thinking){

		thinking = true;
		popposY  = mouseposY;

		setTimeout(function(){

			thinking = false;

			if (mouseposY < popposY){
				exitpopped = 1;
				firepop($('#exitpop'));
			}

		}, 200);
	}

});




$('.popup-modal').on('hidden.bs.modal', function (e) {

	if (typeof myPlayer !== "undefined" && typeof myPlayer.play === "function") {

		myPlayer.play();

	}

	var 
		group = $(this).data('promoGroup'),
		promo = $(this).data('promoName');

	$.cookie('pr_nocre_'+group+'_'+promo, '1',  { path: '/', expires: 1 });

});