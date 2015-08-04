
alert('whattheshit');

/*
var banners = [];


alert($('[data-banner]').length);

/*
$('[data-banner]').each(function(){

	alert('banner');

	banners[$(this).data('banner')] = {width: $(this).data('bannerW'), height: $(this).data('bannerH')};

});

/*
var oas_tag			= oas_tag || {};
oas_tag.url 		= 'oascentral.stackmag.com';//'oasc17.247realmedia.com';//'delivery.uat.247realmedia.com';
oas_tag.sizes 		= function() {
	//oas_tag.definePos('Top',	[728,90]);
	oas_tag.definePos('x65',	[300,250]);
	//oas_tag.definePos('Right3',	[300,250]);
};
oas_tag.query 		= '';	// set keywords to target
oas_tag.analytics 	= true;					// collect taxonomy and referral data
oas_tag.taxonomy 	= 'page=video32'; 			// taxonomy
oas_tag.site_page	= "<?php echo $domain; ?>/index.php";
oas_tag.version 	= '1';
oas_tag.loadAd 		= oas_tag.loadAd || function() {};

function show_banners()
{
	var oas 		= document.createElement('script');
	protocol 		= 'https:' == document.location.protocol?'https://': 'http://',
	node 			= document.getElementsByTagName('script')[0];

	oas.type 		= 'text/javascript';
	oas.async 		= true;
	oas.src 		= protocol + oas_tag.url + '/om/' + oas_tag.version + '.js';

	node.parentNode.insertBefore(oas,node);
}

function refreshAds() 
{
	 oas_tag.reloadAds();
}
*/