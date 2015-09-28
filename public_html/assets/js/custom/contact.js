$(document).ready(function(){

	// on submit, fire click event
	$(".contact-form").on('submit',function(){

		var data 	= JSON.stringify($(".contact-form").serializeArray());

		$(".contact-error").html("Thank you for submitting your question/comment.").addClass('green bold headroom text-center');

		return false;
	});

});