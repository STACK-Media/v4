$(".featured-videos.loadmore").on('click',function(){
	var counter 	= 1;	// init counter
	$(".featured-videos").each(function(){
		if ($(this).hasClass('hidden') && counter <= 2){
			$(this).removeClass('hidden');
			counter++;
		}
	});
});