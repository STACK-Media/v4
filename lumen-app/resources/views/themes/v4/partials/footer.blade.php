<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
<script src="/assets/js/viewport.js"></script>
<script src="/assets/js/events.js"></script>


@section('widget-queued-scripts')

	@if(is_array(Assets::get('javascript')))

		@foreach(Assets::get('javascript') as $key => $script)

			<script type="text/javascript">{{$script}}</script>

		@endforeach

	@endif

@append

@yield('widget-queued-scripts')


</body>
</html>