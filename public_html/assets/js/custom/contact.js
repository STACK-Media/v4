$(document).ready(function(){

	// on submit, fire click event
	$(".contact-form").on('submit',function(){

		// first, validate email address
		if ( ! validate_email($(".contact-email").val())){

			// display success message
			$(".contact-error").html("Please submit a valid email address.").addClass('stack-red bold headroom text-center');			

		} else {

			// initialize variables
			var name 					= $(".contact-name").val();
			var email 					= $(".contact-email").val();
			var from 					= $(".contact-department").val();
			var comments 				= $(".contact-comments").val();

			var data 					= {
				template: 		"params",
				subject: 		"STACK Contact Form Submission ",
				to: 			[
					from,
				],
				params: {
					name: 		name,
					email: 		email,
					comments: 	comments
				}
			};

			// json encode
			//data 		= JSON.stringify(data);

			// make API call
			API('smtp/send',data,'POST',_contact_callback);
		}

		return false;
	});

});

if (typeof validate_email == 'undefined')
{
	function validate_email(email)
	{
		if(email.length){
		    var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
		    return re.test(email);
		}

		return false;
	}
}

function _contact_callback(success,data)
{
	// show success/fail options
	if (success == true)
	{
		// display success message
		$(".contact-error").html("Thank you for submitting your question/comment.").addClass('green bold headroom text-center').removeClass('stack-red');

	} else {

		// show error message
		$(".contact-error").html("There was an error adding your email.  Please try again.").addClass('stack-red bold headroom text-center').removeClass('green');

	}
}





