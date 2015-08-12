

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
oas_tag.site_page	= pageinfo.url;
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

/*
var isMobileAd = isMobileAd || [];
isMobileAd["x60"] = 1;isMobileAd["x61"] = 1;isMobileAd["x62"] = 1;isMobileAd["x63"] = 1;isMobileAd["x64"] = 1;isMobileAd["x26"] = 1;OAS_url 		= 'http://oascentral.stackmag.com';
OAS_sitepage 	= getFileNameTop('www.stack.com');
is_mobile_client = is_mobile_client || false;
if (is_mobile_client)
    OAS_pos 		= 'x60,x61,x62,x63,x64,x26';
else
    OAS_pos 		= 'Top,Right2,Right3,BottomLeft,x20,x26';
OAS_query 		= 'fitnesssection&runningsection';

var OAS_RN 		= new String(Math.random());
var OAS_RNS 	= OAS_RN.substring(2,11);

var src 		= OAS_url + "/RealMedia/ads/adstream_mjx.ads/" + OAS_sitepage + "/1" + OAS_RNS + "@" + OAS_pos + "?" + OAS_query;
console.log(src);
document.write('<scr' + 'ipt type="text/javascript" src="' + src + '"></scr' + 'ipt>');

function getFileNameTop(siteName)
{
	var strFileName;
	var intLocation;
	var strSiteName;

	//strSiteName = "www.stack.com";
	strSiteName = siteName;
	strFileName = document.location.pathname;

	//pathname starts at host URL and a slash so it will always return one slash
	if (strFileName.length == 1)
	{
		//this has to be set for the default file for the site!
		strFileName = "/index.php";
	}

	return strSiteName + strFileName;
}
 */