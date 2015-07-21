$(".loadmore").on('click',function(){
	
	var loadclass = $(this).data('loadmore');
	$('.'+loadclass+'.hidden').slice(0,2).removeClass('hidden');

});