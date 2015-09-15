
function show_flyout()
{
	if ($('#flyout').is(':visible')){
		return;
	}

	if ($(document).scrollTop() > 750){
		$('#flyout').slideDown();
	}
}

show_flyout();

$(window).scroll(function() {
	
	clearTimeout($.data(this, 'scrollTimer'));
	
	$.data(this, 'scrollTimer', setTimeout(function() {
		
		show_flyout();

	}, 300));

});