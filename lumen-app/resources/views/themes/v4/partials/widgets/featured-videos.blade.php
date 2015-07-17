{!! Assets::queue('javascript', 'featured-videos', '/assets/js/widgets/featured-videos.js') !!}

<div class="row">

	<div class="col-xs-12">
		
		<h3>Featured Videos</h3>
	
	</div>

	@foreach($playlist['videos'] as $key => $value)

		<?php $class 	= ($key < 3)? '': 'hidden'; ?>

		<div class="col-xs-12 event featured-videos {{$class}}" data-name="{{$key}}" data-template="featured-videos">

			<a href="/video/{{$value['id']}}/video-title">
				<div class="img-block">
					<img class="img-responsive" src="{{$value['videoStillURL']}}" alt="{{$value['name']}}" />
				</div>
				{{$value['name']}}
			</a>
			<p>Views: {{$value['playsTotal']}}</p>

		</div>

	@endforeach

	<p><a class="loadmore featured-videos">Load More</a></p>

</div>
