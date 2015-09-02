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

			// log it
			console.log('*** AJAX SUCCESS **');
			console.log('[DATA] ' + data);
			console.log('*** END AJAX SUCCESS **');

			// parse the data
			var data 	= JSON.parse(data);

			// callback
			callback(data.success,data.data);
		},
		error: 		function(jqXHR, textStatus, errorThrown) {
			
			// log it
			console.log('*** AJAX ERROR **');
			console.log('[REQUEST] ' + url);
			console.log('[TYPE] ' + type);
			console.log('[jqHXR] ' + jqHXR);
			console.log('[STATUS] ' + textStatus);
			console.log('[ERROR] ' + errorThrown);
			console.log('*** END AJAX ERROR ***');

			// callback
			callback(false,errorThrown);	
		}
	});
}
