{!! Assets::queue('stylesheet', 'featured-videos', '/assets/widgets/css/featured-videos.css') !!}

{!! Assets::queue('javascript', 'featured-videos', '/assets/widgets/js/featured-videos.js') !!}

<div class="row">

	<div class="col-xs-12">
		
		<h3>Featured Videos</h3>
	
	</div>

	@foreach($playlist['videos'] as $key => $value)

		<div class="col-xs-12 event" data-name="1001" data-template="sidebar-featured">

			<div class="img-block"></div>
			<a href="/video2/4114135025001/{{$playlist['id']}}/{{$value['id']}}">Path to the Pros: Comeback Kids</a>
			<p>Views: 1,903,546</p>

		</div>

	@endforeach

</div>
