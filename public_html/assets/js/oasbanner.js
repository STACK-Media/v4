

var banners = [];


$('[data-banner]').each(function(){

	banners[$(this).data('banner')] = {width: $(this).data('bannerW'), height: $(this).data('bannerH')};

});


var oas_tag			= oas_tag || {};
oas_tag.url 		= 'oascentral.stackmag.com';//'oasc17.247realmedia.com';//'delivery.uat.247realmedia.com';
oas_tag.sizes 		= function() {
	
	for (banner in banners){

		oas_tag.definePos(banner, [banners[banner].width, banners[banner].height]);

	}

};
oas_tag.query 		= '';	// set keywords to target
oas_tag.analytics 	= true;					// collect taxonomy and referral data
oas_tag.taxonomy 	= 'page=video32'; 			// taxonomy
oas_tag.site_page	= "www.stack.com/index.php";
oas_tag.version 	= '1';
oas_tag.loadAd 		= oas_tag.loadAd || function() {};

show_banners();

for (banner in banners){

	oas_tag.loadAd(banner);

}



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
