

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

		var lists = [];
		$('#kaepernick input[name^="lists"]').each(function() {
			lists.push($(this).attr('name').replace('lists[','').replace(/[\[\]']+/g,''));
		});

		
		$.post(
			'/api/v1/esp/lead', {email: email, lists: lists}, function(data)
			{
				
				$('#intropop').modal('hide');

				$.cookie('pr_nocre_popstitial_kaepernick', '1', { path: '/', expires: 30});

			} 

		);
		
	}else {

		alert('This doesn\'t appear to be a valid email address. Please try again.');

	}

});