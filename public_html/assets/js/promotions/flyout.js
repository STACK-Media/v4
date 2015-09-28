
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

$('.flyswat').click(function(e){

	e.preventDefault();

	var 
		group = $('#flyout').data('promoGroup'),
		promo = $('#flyout').data('promoName');

	$.cookie('pr_nocre_'+group+'_'+promo, '1',  { path: '/', expires: 1 });

	flyout_hidden = true;

	$('#flyout').hide();

});