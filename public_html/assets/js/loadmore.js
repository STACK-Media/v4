$(".loadmore").on('click',function(){
	
	var loadclass = $(this).data('loadmore');
	var counter[loadclass] = 1;	// init counter
	
	$("."+loadclass).each(function(){

		if ($(this).hasClass('hidden') && counter[loadclass] <= 2){

			$(this).removeClass('hidden');
			counter[loadclass]++;
		
		}

	});

});