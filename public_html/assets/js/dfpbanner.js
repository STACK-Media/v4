(function ($, window) {

	"use strict";

	var 
		is_phone       = window.matchMedia("only screen and (max-width: 768px)"),
		ad_elems       = '.desktop-adunit',
		adcats         = (typeof pageinfo.taxonomy.category !== 'undefined') ? pageinfo.taxonomy.category : [],
		adtags         = (typeof pageinfo.taxonomy.post_tag !== 'undefined') ? pageinfo.taxonomy.post_tag : [],
		networkCode    = '19565616',
		topLevelAdUnit = "stack",
		s1             = "media", // homepage, article, video, landing, etc..
		adUnit         = topLevelAdUnit + "." + s1,
		slotName       = "/" + networkCode + "/" + adUnit,
		url            = pageinfo.url, // add full URL
		article        = "",
		targeting      = {},
		i              = 0;


	if (is_phone.matches){

		ad_elems = '.mobile-adunit';
	}

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


	targeting = {
		s1:      s1,
		url:     url,
		kw:      adcats,
		article: article,
	};


	$(ad_elems).addClass('adunit').each(function(){

		targeting.pos = $(this).data('adspot').toLowerCase();

		$(this).data('targeting', targeting);

		//console.log($(this).data('targeting'));

	});
	


	$.getScript("/assets/third-party/jquery.dfp.js-master/jquery.dfp.min.js", function () {

		$.dfp({

			// Set the DFP ID
			'dfpID': networkCode,

			// Callback which is run after the render of each ad.
			afterEachAdLoaded: function (adUnit) {

				// Do something after each ad is loaded.

				if ($(adUnit).hasClass('display-none')) {
					// Ad not found
				} else {
					// Ad found
				}

			},

			// Callback which is run after the render of all ads.
			afterAllAdsLoaded: function (adUnits) {

				// Do something after all ads are loaded.

			},
			
			alterAdUnitName: function(adUnitName,adUnit) {
				// Modify add unit name. For example, can add a prefix or suffix
				
				return adUnitName;
				//return 'PREFIX_' + adUnitName + '_SUFFIX';
			}

		});

	});

})(window.jQuery, window);
