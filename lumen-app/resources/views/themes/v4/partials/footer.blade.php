<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
<script src="/assets/js/viewport.js"></script>
<script src="/assets/js/events.js"></script>

@yield('widget-scripts')


@section('widget-array-js')

	<?php if (isset($widget_scripts)): ?>

		{{count($widget_scripts)}}

		@foreach($widget_scripts as $key => $val)

			{{$val}}

		@endforeach

	<?php endif; ?>

	parent?

	<?php echo 'testing '. json_encode(\App\Models\TestHTML::get('javascript')) ?>

@append

@yield('widget-array-js')




<?php /*
@foreach($widget_scripts as $key => $val)
	<script type="text/javascript" src="{{$val}}"></script>
@endforeach
*/ ?>

</body>
</html>