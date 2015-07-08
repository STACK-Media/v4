<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
<script src="/assets/js/viewport.js"></script>
<script src="/assets/js/events.js"></script>


@if(is_array(Assets::get('javascript')))

	@foreach(Assets::get('javascript') as $key => $script)

		<script type="text/javascript" src="{{$script}}"></script>

	@endforeach

@endif


</body>
</html>