<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="/assets/third-party/initializr/js/vendor/jquery-1.11.2.min.js"><\/script>')</script>

<script src="/assets/third-party/initializr/js/vendor/bootstrap.min.js"></script>

<script src="/assets/js/viewport.js"></script>
<script src="/assets/js/events.js"></script>


@if(is_array(Assets::get('javascript')))

	@foreach(Assets::get('javascript') as $key => $script)

		<script type="text/javascript" src="{{$script['src']}}" {{$script['custom']}}></script>

	@endforeach

@endif


</body>
</html>