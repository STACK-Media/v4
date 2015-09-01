function validate_email(email)
{
	if(email.length){
	    var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
	    return re.test(email);
	}

	return false;
}

(function ($, window) {

	"use strict";

	// button submit
	$(".esp-submit").on('click',function(){

		// form validation
		var valid 	= validate_email($(".esp-email").val());

		// clear the current message
		$(".esp-message").html("");

		// submit form if valid
		if (valid)
		{
			// submit form
			$(".esp-optin").submit();
			$("#newsletter-form").addClass("error");
			$("#newsletter-form").html("You have successfully registered for our newsletter.");

		} else {

			// show error message
			$(".esp-message").html("Please enter a valid email address.");

		}

	});

	$(".esp-optin").on('submit',function(){
		
		// grab form values
		var serialize 	= JSON.stringify($(this).serialize());

		// submit data to ESP

		// show success message if user has

		return false;
	});

})(window.jQuery, window);