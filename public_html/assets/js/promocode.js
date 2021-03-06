
function shuffle(array) 
{

	var currentIndex = array.length, temporaryValue, randomIndex ;

	// While there remain elements to shuffle...
	while (0 !== currentIndex) {

		// Pick a remaining element...
		randomIndex   = Math.floor(Math.random() * currentIndex);
		currentIndex -= 1;

		// And swap it with the current element.
		temporaryValue      = array[currentIndex];
		array[currentIndex] = array[randomIndex];
		array[randomIndex]  = temporaryValue;
	
	}

	return array;
}

function shuffle_keys(object)
{
	return shuffle(Object.keys(object));
}

function _check_cancel_cookie(cookiename, frequency)
{
	if ($.cookie(cookiename)){
		return false;
	}

	if (frequency){

		var expiry = new Date();
		expiry.setSeconds(expiry.getSeconds() + parseInt(frequency));

		$.cookie(cookiename, '1', { path: '/', expires: expiry});
	}

	return true;
}

var 
	grpcookie  = '', 
	creacookie = '', 
	showpromos = [],
	okeys      = [];

for(group in pageinfo.promos){

	grpcookie  = 'pr_nogrp_'+group;

	if ( ! _check_cancel_cookie(grpcookie, pageinfo.promos[group].frequency)){
		continue;
	}

	if (pageinfo.promos[group].type == 'random'){
		okeys = shuffle_keys(pageinfo.promos[group].creatives);
	}else{
		okeys = Object.keys(pageinfo.promos[group].creatives);
	}

	for (i in okeys){

		creacookie = 'pr_nocre_'+group+'_'+okeys[i];

		if ( ! _check_cancel_cookie(creacookie, pageinfo.promos[group].creatives[okeys[i]].frequency)){
			continue;
		}

		if ( ! (group in showpromos)){
			showpromos[group] = [];
		}

		// undefined showpromos[group] - need to fix
		showpromos[group][okeys[i]] = pageinfo.promos[group].creatives[okeys[i]];

		break;

	}

}

var jsarray = [];

for (group in showpromos){
		
	for (creative in showpromos[group]){

		$.getJSON('/api/v1/promos/'+group+'/'+creative, function( data ) {

			var assets = ['javascript', 'stylesheet'];

			if ( ! data.success){
				return;
			}

			if ('stylesheet' in data.data && data.data.stylesheet){

				for (i in data.data.stylesheet){
					
					$('head').append('<link rel="stylesheet" href="'+data.data.stylesheet[i]+'" type="text/css" />');

				}

			}


			$('body').append(data.data.view);


			if ('javascript' in data.data && data.data.javascript){

				var jsfiledelay = function (jsfiles) {

					setTimeout(function() {

						for (i in jsfiles){

							$.getScript(jsfiles[i]);

						}

					}, 300);
				
				};

				jsfiledelay(data.data.javascript);

			}

		});

	}
	
}