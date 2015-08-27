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

<?php /* @include('theme::partials.pixels.pageproofer') */ ?>

</body>
</html>