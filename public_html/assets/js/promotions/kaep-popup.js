

if (typeof validateEmail !== 'function') {
	function validateEmail($email) {
		var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
		return emailReg.test( $email );
	}
}


$('#kaepernick').submit(function (e) {

	var 
		form  = this,
		email = $('#kaepemail').val().trim().toLowerCase();
	
	e.preventDefault();
	
	if (email && validateEmail(email)) {

		alert('email is valid');
		//form.submit();

	}else {

		alert('This doesn\'t appear to be a valid email address. Please try again.');

	}

});