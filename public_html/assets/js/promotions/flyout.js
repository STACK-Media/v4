
var flyout_hidden = false;

function show_flyout()
{
	if ($('#flyout').is(':visible') || flyout_hidden){
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

$('#flyout').on('click', '.flyswat', function(e){

	e.preventDefault();

	flyout_hidden = true;

	$('#flyout').hide();

});