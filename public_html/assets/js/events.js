$(document).ready(function(){

	//////////////////////////////////////////////////////
	// track impression events
	$('[data-name^=adunit-]').each(function(index){

		var widget 		= $(this).attr('data-name');
		var template 	= $(this).attr('data-template');
			
		// track event 
		_event(template,'impression',widget,index);

		// set position
		$(this).attr('data-position',index);

	});	
	$('[data-name^=content-]').each(function(index){

		var widget 		= $(this).attr('data-name');
		var template 	= $(this).attr('data-template');
			
		// track event 
		_event(template,'impression',widget,index);

		// set position
		$(this).attr('data-position',index);

	});
	$('[data-name^=sidebar-]').each(function(index){

		var widget 		= $(this).attr('data-name');
		var template 	= $(this).attr('data-template');
			
		// track event 
		_event(template,'impression',widget,index);

		// set position
		$(this).attr('data-position',index);

	});
	$('[data-name^=postcontent-]').each(function(index){

		var widget 		= $(this).attr('data-name');
		var template 	= $(this).attr('data-template');
			
		// track event 
		_event(template,'impression',widget,index);

		// set position
		$(this).attr('data-position',index);
	});	

	// track widget events (within widgets)
	$('[data-template^=content-]').each(function(index){

		var widget 		= $(this).attr('data-name');
		var template 	= $(this).attr('data-template');
			
		// track event 
		_event(template,'impression',widget,index);

		// set position
		$(this).attr('data-position',index);

	});	
	$('[data-template^=sidebar-]').each(function(index){

		var widget 		= $(this).attr('data-name');
		var template 	= $(this).attr('data-template');
			
		// track event 
		_event(template,'impression',widget,index);

		// set position
		$(this).attr('data-position',index);

	});	


	//////////////////////////////////////////////////////
	// track click events
	$('.event').on('click',function(){

		var widget 		= $(this).attr('data-name');
		var template 	= $(this).attr('data-template');
		var position 	= $(this).attr('data-position');
			
		// track event 
		_event(template,'click',widget,position);

	});


	//////////////////////////////////////////////////////
	// track viewport events
	$(window).scroll(function(event){

		// track viewport events
		$('.event:in-viewport(300)').each(function(){

			var viewport 	= $(this).attr('data-viewport');

			if (viewport == undefined)
			{
				var widget 		= $(this).attr('data-name');
				var template 	= $(this).attr('data-template');
				var position 	= $(this).attr('data-position');
			
				// track event 
				_event(template,'viewport',widget,position);

				// add viewport attribute (so we don't track this again)
				$(this).attr('data-viewport',true);
			}

		});

	});


});

// track an event
function _event(category,action,label,value) {

	// log to console
	console.log('[EVENT] ' + category + ' ' + action + ' ' + label + ' ' + value);

	// send to GA
	//ga('send','event',category,action,label,value);
}