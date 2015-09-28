

var 
	banners  = [],
	is_phone = window.matchMedia("only screen and (max-width: 768px)"),
	abbrev   = (is_phone.matches ? 'M' : 'D'),
	adcats   = (typeof pageinfo.taxonomy.category 	!== 'undefined') ? pageinfo.taxonomy.category : [],
	adtags   = (typeof pageinfo.taxonomy.post_tag 	!== 'undefined') ? pageinfo.taxonomy.post_tag : [],
	adslug   = (typeof pageinfo.slug 				!== 'undefined') ? pageinfo.slug : '',
	adqry    = '',
	oas_tag  = oas_tag || {};

if (typeof adcats === 'string'){
	adcats = [adcats];
}

if (typeof adtags === 'string'){
	adtags = [adtags];
}

if (typeof pageinfo.type !== 'undefined' && pageinfo.type != ''){
	adcats.push(pageinfo.type);
}

adqry 	= adtags.concat(adcats).join('section,').replace(/-/g, '');
adqry 	= (adqry !== '') ? adqry+'section' : '';
adqry 	= (adqry !== '') ? adqry + ',' + adslug : adslug;

$('[data-oas-'+abbrev.toLowerCase()+']').each(function(){

	banners[$(this).data('oas'+abbrev)] = {width: $(this).data('oasW'), height: $(this).data('oasH')};

});

oas_tag.url 		= 'oascentral.stackmag.com';//'oasc17.247realmedia.com';//'delivery.uat.247realmedia.com';
oas_tag.sizes 		= function() {
	
	for (banner in banners){

		oas_tag.definePos(banner, [banners[banner].width, banners[banner].height]);

	}

};

oas_tag.query 		= adqry;	// set keywords to target, comma-delimited (category or tag)
oas_tag.analytics 	= true;					// collect taxonomy and referral data
oas_tag.taxonomy 	= ''; 			// taxonomy, comma-delimited -- currently not being used
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
	protocol 		= 'https:' == document.location.protocol ? 'https://': 'http://',
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
