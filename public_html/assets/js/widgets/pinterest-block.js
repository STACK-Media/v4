$(document).ready(function(){

	// iterate each pinterest image
	$(".pinterest-item img").each(function(){

		// supply random height 
		var max 	= 250;
		var min 	= 195;
		// update the image height
		$(this).css('height',Math.random() * (max - min) + min + 'px');

	});

});