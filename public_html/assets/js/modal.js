
$(document).ready(function(){

	// grab pageinfo
	//alert(pageinfo.type);

	// determine if this page needs a modal
	//API('content/modal',{category: pageinfo.taxonomy.category, tag: pageinfo.taxonomy.post_tag},'GET',_modal_callback);
	//_modal_callback(true,{});
});

function _modal_callback(success,data)
{
	// if we don't need to display modal, quit here
	if (success != true)
	{
		return false;
	}

	// update modal content
	$(".modal-body").html("testing my new modal");

	// fire modal
	$("#modal").modal("show");

}