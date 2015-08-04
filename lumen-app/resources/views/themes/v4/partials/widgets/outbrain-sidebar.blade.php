{!! Assets::queue('stylesheet', 'widgets', 'outbrain', '/assets/css/widgets/outbrain-sidebar.css') !!}
{!! Assets::queue('javascript', 'asyncwidgets', 'outbrain', '//widgets.outbrain.com/outbrain.js', array('async' => 'async')) !!}

<section data-name="outbrain-sidebar-widget">

	<div class="row outbrain-sidebar-widget">

		<div class="col-xs-12">
			
			<div class="OUTBRAIN" data-src="{!! $outbrain_url !!}" data-widget-id="SB_4" data-ob-template="stack" ></div>
		
		</div>

		<div class="clearfix"></div>	

	</div>

</section>