$(document).ready(function(){

	// on submit, fire click event
	$(".beast-squad-form").on('submit',function(){

		// first, validate email address
		if ( ! validate_email($(".beast-squad-email").val())){

			// display success message
			$(".beast-squad-error").html("Please submit a valid email address.").addClass('stack-red bold headroom text-center');			

		} else {

			// initialize variables
			var name 		= $(".beast-squad-name").val();
			var email 		= $(".beast-squad-email").val();
			var dob 		= $(".beast-squad-dob").val();
			var gender 		= $(".beast-squad-gender").val();
			var graduation 	= $(".beast-squad-graduation").val();
			var address 	= $(".beast-squad-address").val();
			var address2 	= $(".beast-squad-address2").val();
			var city 		= $(".beast-squad-city").val();
			var state 		= $(".beast-squad-state").val();
			var zip 		= $(".beast-squad-zip").val();
			var high_school	= $(".beast-squad-high-school").val();
			var ad 			= $(".beast-squad-ad").val();
			var fan 		= $(".beast-squad-fan").val();
			var facebook 	= $(".beast-squad-facebook").val();
			var twitter 	= $(".beast-squad-twitter").val();
			var instagram	= $(".beast-squad-instagram").val();
			var snapchat  	= $(".beast-squad-snapchat").val();
			var other 	 	= $(".beast-squad-other").val();
			var awards 		= $(".beast-squad-awards").val();
			var comments 	= $(".beast-squad-comments").val();

			var data 					= {
				template: 		"params",
				subject: 		"STACK Beast Form Submission ",
				to: 			[
					'beast@stack.com',
				],
				params: {
					name: 			name,
					email: 			email,
					dob: 			dob,
					gender: 		gender,
					graduation: 	graduation,
					address: 		address,
					address2: 		address2,
					city: 			city,
					state: 			state,
					zip: 			zip,
					high_school: 	high_school,
					director: 		ad,
					fan: 			fan,
					facebook: 		facebook,
					twitter: 		twitter,
					instagram: 		instagram,
					snapchat: 		snapchat,
					other: 			other,
					awards: 		awards,
					comments: 		comments
				}
			};

			// json encode
			//data 		= JSON.stringify(data);

			// make API call
			API('smtp/send',data,'POST',_beast_squad_callback);
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

function _beast_squad_callback(success,data)
{
	// show success/fail options
	if (success == true)
	{
		// display success message
		$(".beast-squad-form").html("Thank you for submitting your response.").addClass('green bold headroom text-center').removeClass('stack-red');
		window.location 	= "#beast-squad-form";

	} else {

		// show error message
		$(".beast-squad-error").html("There was an error submitting your infromation.  Please try again.").addClass('stack-red bold headroom text-center').removeClass('green');

	}
}





