(function ($, window) {

	"use strict";

	$(".magazine-dropdown select").on('change',function(){
		
		// grab magazine to redirect to
		var magazine 		= $(this).val();

		// perform redirect
		window.location 	= '/magazine/' + magazine;

	});

})(window.jQuery, window);