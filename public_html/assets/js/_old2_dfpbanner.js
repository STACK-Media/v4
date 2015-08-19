var 
	googletag      = googletag || {},
	networkCode    = '19565616',
	topLevelAdUnit = "stack",
	s1             = "media", // homepage, article, video, landing, etc..
	adUnit         = topLevelAdUnit + "." + s1,
	slotName       = "/" + networkCode + "/" + adUnit,
	url            = pageinfo.url, // add full URL
	article        = "",
	gptAdSlots     = [],
	adcats         = (typeof pageinfo.taxonomy.category !== 'undefined') ? pageinfo.taxonomy.category : [],
	adtags         = (typeof pageinfo.taxonomy.post_tag !== 'undefined') ? pageinfo.taxonomy.post_tag : [];

googletag.cmd  = googletag.cmd || [];

if (typeof adcats === 'string'){
	adcats = [adcats];
}

if (typeof adtags === 'string'){
	adtags = [adtags];
}

if (typeof pageinfo.type !== 'undefined' && pageinfo.type != ''){
	adcats.push(pageinfo.type);
}

for (i in adcats){
	adcats[i] = adcats[i] + 'section';
}

(function() {
	var gads   = document.createElement('script');
	gads.async = true;
	gads.type  = 'text/javascript';
	var useSSL = 'https:' == document.location.protocol;
	gads.src   = (useSSL ? 'https:' : 'http:') +
	   '//www.googletagservices.com/tag/js/gpt.js';
	var node = document.getElementsByTagName('script')[0];
	node.parentNode.insertBefore(gads, node);
})();


var gptAdSlots = [];