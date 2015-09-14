
function show_flyout()
{
	if ($('#flyout').is(':visible')){
		return;
	}

	if ($(document).scrollTop() > 1000){
		$('#flyout').slideDown();
	}
}

setTimeout(function(){

	show_flyout();
	
	$(window).scroll(function() {
		
		clearTimeout($.data(this, 'scrollTimer'));
		
		$.data(this, 'scrollTimer', setTimeout(function() {
			
			show_flyout();

		}, 300));
	
	});

}, 300);
