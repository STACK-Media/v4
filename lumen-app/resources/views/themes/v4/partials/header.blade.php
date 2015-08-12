<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
<head>

	@include('theme::partials.head')

	
	@if(is_object($page))

		<?php

		$jstax = array();

		if ( is_array($page->taxonomy)):

			foreach($page->taxonomy as $type => $taxes):
			
				foreach($taxes as $tax):

					$jstax[$type][] = $tax->slug;

					if (property_exists($tax, 'parent') && isset($tax->parent['slug'])):

						$jstax[$type][] = $tax->parent['slug'];

					endif;

				endforeach;

			endforeach;

		endif;

		?>

		<script type="text/javascript">

			var pageinfo = {
				url: "{!! preg_replace('#^https?://#', '', str_replace('v4.','stage.',str_replace('.v4','.com',Request::url()))) !!}",
				type: "{!! $page->page_type !!}",
				taxonomy: {!! json_encode($jstax) !!}
			};

		</script>
		
	@endif

	<!-- header javascript files -->

	{!! Assets::get_queued('headscript') !!} 

	@if(is_array(Assets::get_queued_raw('headscript')))

		@foreach (Assets::get_queued_raw('headscript') as $key => $arr)

			<?php

			// yes.. mixing PHP and blade, but
			// wanted to reduce whitespace in attributes
			// between blade control tags

			$attribs = array();

			if (isset($arr['custom']) && is_array($arr['custom'])):

				foreach ($arr['custom'] as $key => $val):

					$attribs[] = $key . '="' . $val . '"';

				endforeach;

			endif;

			?>

			<script src="{!! $arr['src'] !!}" {!! implode(' ', $attribs) !!}></script>

		@endforeach

	@endif

	<!-- stylesheets -->

	{!! Assets::get_queued('stylesheet') !!} 

	@if(is_array(Assets::get_queued_raw('stylesheet')))

		@foreach (Assets::get_queued_raw('stylesheet') as $key => $arr)

			<?php

			// yes.. mixing PHP and blade, but
			// wanted to reduce whitespace in attributes
			// between blade control tags

			$attribs = array();

			if (isset($arr['custom']) && is_array($arr['custom'])):

				foreach ($arr['custom'] as $key => $val):

					$attribs[] = $key . '="' . $val . '"';

				endforeach;

			endif;

			?>

			<link href="{!! $arr['src'] !!}" rel="stylesheet" {!! implode(' ', $attribs) !!}>

		@endforeach

	@endif

</head>
<body>
	
	<!-- Google Tag Manager -->
	<noscript><iframe src="//www.googletagmanager.com/ns.html?id=GTM-58NL9Q"
	height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
	<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
	new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
	j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
	'//www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
	})(window,document,'script','dataLayer','GTM-58NL9Q');</script>
	<!-- End Google Tag Manager -->
