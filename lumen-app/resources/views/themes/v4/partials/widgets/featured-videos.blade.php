{!! Assets::queue('javascript',  'widgets', 'loadmore', '/assets/js/loadmore.js') !!}

<div class="row">

	<div class="col-xs-12">

		<h3>Featured Videos</h3>

		@foreach($playlist['videos'] as $key => $value)

			<?php $class = ($key < 3) ? '': 'hidden'; ?>

			<div class="event featured-videos {{$class}} event" data-name="{{$key}}" data-template="featured-videos">

				<a href="{!! routelink('video', array('id' => $value['id'], 'slug' => 'video-title')) !!}">
					<div class="img-block">
						<img class="img-responsive" src="{{$value['videoStillURL']}}" alt="{{$value['name']}}" />
					</div>
					{{$value['name']}}
				</a>
				<p>Views: {{$value['playsTotal']}}</p>

			</div>

		@endforeach

	</div>

	<div class="clearfix"></div>

	<div class="col-sm-6 col-sm-offset-3">
		<p><a class="loadmore" data-loadmore="featured-videos">Load More</a></p>
	</div>

</div>