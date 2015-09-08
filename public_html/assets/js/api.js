// initialize any global variables
var apiversion 	= 'v1';

// method to AJAX call our internal API's
function API(method,data,type,callback)
{
	// initialize variables
	var url 	= '/api/' + apiversion + '/' + method;

	// make the ajax call
	$.ajax({
		type: 	type,
		data: 	data,
		url: 	url,
		success: 	function(data, textStatus, jqXHR) {

			// parse the data
			var data 	= JSON.parse(data);

			// callback
			callback(data.success,data.data);
		},
		error: 		function(jqXHR, textStatus, errorThrown) {

			// callback
			callback(false,errorThrown);	
		}
	});
}
