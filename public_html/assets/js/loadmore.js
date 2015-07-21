$(".loadmore").on('click',function(){
	
	var loadclass = $(this).data('loadmore'),
		counter = 1;	// init counter
	
	$('.'+loadclass).each(function(){

		if ($(this).hasClass('hidden') && counter <= 2){

			$(this).removeClass('hidden');
			counter++;
		
		}

	});

});