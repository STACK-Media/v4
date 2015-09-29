<?php 
/*
// put variables into an object to reduce possible naming collisions
$fbpixel_props = new stdClass();

$fbpixel_props->keys = array(
	'metaKeywords' => 'viewMetaKey', // meta key => meta value (Tax_SEO_Keywords) <-- possible multiple that are comma sep
	'oasKeywords'  => 'viewOasKey', <-- category, tags + 'section'
	'subsiteName'  => 'viewSubsite'
);

$fbpixel_props->comma_separated = array(
	'metaKeywords'
);

$fbpixel_props->events = array();


foreach ($fbpixel_props->keys as $pagekey => $eventkey):

	if ( ! is_object($page) || ! isset($page->$pagekey)):

		continue;

	endif;

	$fb_event_vals = $page->$pagekey;

	if (in_array($pagekey, $fbpixel_props->comma_separated) && ! is_array($fb_event_vals)):

		// explode comma-separated values
		$fb_event_vals = explode(',', $fb_event_vals);

	endif;

	if ( ! is_array($fb_event_vals)):

		// 2 of 3 items are arrays.. may as well make them all arrays to simplify
		$fb_event_vals = array($fb_event_vals);

	endif;

	// remove empty array values
	$fb_event_vals = array_map('trim', $fb_event_vals);
	$fb_event_vals = array_filter($fb_event_vals);

	if ( ! $fb_event_vals):

		// no values, move along
		continue;

	endif;

	foreach ($fb_event_vals as $fb_event_val):

		$fbpixel_props->events[$eventkey][] = $fb_event_val;

	endforeach;

	// loop events array below and display JS and img tag

endforeach;

?>

<script>(function() {
var _fbq = window._fbq || (window._fbq = []);
if (!_fbq.loaded) {
var fbds = document.createElement('script');
fbds.async = true;
fbds.src = '//connect.facebook.net/en_US/fbds.js';
var s = document.getElementsByTagName('script')[0];
s.parentNode.insertBefore(fbds, s);
_fbq.loaded = true;
}
_fbq.push(['addPixelId', '712753655413201']);
})();
window._fbq = window._fbq || [];
window._fbq.push(['track', 'PixelInitialized', {}]);
</script>
<noscript>
	<img height="1" width="1" alt="" style="display:none" src="https://www.facebook.com/tr?id=712753655413201&amp;ev=PixelInitialized" />
</noscript>

<?php foreach ($fbpixel_props->events AS $fbeventname => $fbeventarr): 

	if (count($fbeventarr) === 1):

		$fbeventarr = array_shift($fbeventarr);

	endif; ?>

	<script type="text/javascript">
		window._fbq.push(['track', '<?php echo $fbeventname;?>', {value: <?php echo json_encode($fbeventarr); ?>}]);
	</script>

<?php endforeach; */?>