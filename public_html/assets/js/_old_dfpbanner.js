
(function() {
var useSSL = 'https:' == document.location.protocol;
var src = (useSSL ? 'https:' : 'http:') + '//www.googletagservices.com/tag/js/gpt.js';
document.write('<scr' + 'ipt src="' + src + '"></scr' + 'ipt>');
})();

var 
	networkCode    = '19565616',
	topLevelAdUnit = "stack",
	s1             = "media", // homepage, article, video, landing, etc..
	adUnit         = topLevelAdUnit + "." + s1,
	slotName       = "/" + networkCode + "/" + adUnit,
	url            = page_info.url, // add full URL
	article        = "",
	slots          = {},
	is_phone       = window.matchMedia("only screen and (max-width: 768px)"),
	abbrev         = (is_phone.matches ? 'M' : 'D'),
	adcats         = (typeof pageinfo.taxonomy.category !== 'undefined') ? pageinfo.taxonomy.category : [],
	adtags         = (typeof pageinfo.taxonomy.post_tag !== 'undefined') ? pageinfo.taxonomy.post_tag : [],
	googletag      = googletag || {};

googletag.cmd = googletag.cmd || [];

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

googletag.cmd.push(function() {

	$('[data-dfp-'+abbrev.toLowerCase()+']').each(function(){

		var spot_name = $(this).data('dfp'+abbrev);

		slots[spot_name] = googletag.defineSlot(slotName, [$(this).data('dfpW'), $(this).data('dfpH')], spot_name).addService(googletag.pubads()).setTargeting("pos", spot_name.toLowerCase());

	});

	googletag.pubads().setTargeting("s1",		s1);
	googletag.pubads().setTargeting("url",		url);
	googletag.pubads().setTargeting("kw",		adcats);
	googletag.pubads().setTargeting("article",	article);
	googletag.pubads().enableSingleRequest();
	googletag.enableServices();
});

refreshAds = function(refresh_slots) {

	if(typeof(refresh_slots) == "undefined") {

		googletag.pubads().refresh();

	} else {

		googletag.pubads().refresh(refresh_slots);
	}

	console.log("DFP Ad Refresh has been requested.");
};