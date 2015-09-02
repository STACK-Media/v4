function validate_email(email)
{
	if(email.length){
	    var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
	    return re.test(email);
	}

	return false;
}

$(document).ready(function(){

	// if cookie exists, don't display newsletter
	if ($.cookie('_stack_lead'))
	{
		$(".newsletter-optin").html("");
	}

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

		} else {

			// show error message
			$(".esp-message").html("Please enter a valid email address.");

		}

	});

	$(".esp-optin").on('submit',function(){
		
		// grab form values
		var data 		= $(this).serializeArray();

		// make API call
		API('esp/lead',data,'POST',_newsletter_callback);

		return false;
	});

});

function _newsletter_callback(success,data)
{
	// show success/fail options
	if (success == true)
	{
		// set cookie
		$.cookie("_stack_lead",		true);
		$.cookie("_newsletter_lead",true);

		// show success message
		$("#newsletter-form").addClass("error");
		$("#newsletter-form").html(data.email + " has successfully registered for our newsletter.");

	} else {

		// show error message
		$(".esp-message").html("There was an error adding your email.  Please try again.");

	}
}


