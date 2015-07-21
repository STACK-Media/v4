{!! Assets::queue('stylesheet', 'widgets', 'social-connect', '/assets/css/widgets/social-icons.css') !!}

<div class="row">

	<div class="col-xs-12">

		<h3>Connect</h3>

		<div class="event social-connect event" data-name="0" data-template="social-connect">

			@foreach($social AS $name => $url)

					<a href="{{$url}}" class="icon {{$name}}" alt="{{$name}}" rel="nofollow" target="_blank"></a>

			@endforeach

		</div>

	</div>

</div>