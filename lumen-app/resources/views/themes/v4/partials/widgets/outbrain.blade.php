{!! Assets::queue('stylesheet', 'outbrain', '/assets/css/widgets/outbrain.css') !!}
{!! Assets::queue('javascript', 'outbrain', '//widgets.outbrain.com/outbrain.js', 'async=async') !!}

<div class="row">

	<div class="col-xs-12">
		
		<div class="OUTBRAIN" data-src="{!! $outbrain_url !!}" data-widget-id="AR_2" data-ob-template="stack" ></div>
	
	</div>

	<div class="clearfix"></div>	

</div>