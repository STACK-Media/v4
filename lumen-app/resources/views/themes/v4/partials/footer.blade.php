{!! Assets::queue('javascript', 'global', 'jquery', '/assets/js/jquery-1.11.3.min.js') !!}
{!! Assets::queue('javascript', 'global', 'bootstrap', '/assets/third-party/initializr/js/vendor/bootstrap.min.js') !!}
{!! Assets::queue('javascript', 'global', 'viewport', '/assets/js/viewport.js') !!}
{!! Assets::queue('javascript', 'global', 'events', '/assets/js/events.js') !!}

<!-- footer javascript files -->

{!! Assets::get_queued('javascript') !!}

@if(is_array(Assets::get_queued_raw('javascript')))

	@foreach (Assets::get_queued_raw('javascript') as $key => $arr)

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

</body>
</html>