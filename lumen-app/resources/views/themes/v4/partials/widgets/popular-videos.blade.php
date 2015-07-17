{!! Assets::queue('javascript', 'popular-videos', '/assets/js/widgets/popular-videos.js') !!}

<div class="row">

	<div class="col-xs-12">

		<div class="row">

			<div class="col-xs-12">
				
				<h3>Most Popular Videos</h3>
			
			</div>

		</div>

		@foreach($playlist['videos'] as $key => $value)

			<?php $class 	= ($key < 3)? '': 'hidden'; ?>

			<div class="row event popular-videos {{$class}} event" data-name="{{$key}}" data-template="popular-videos">

				<div class="col-xs-6">

					<a href="/video/{{$value['id']}}/video-title">
						<div class="thumbnail">
							<img class="img-responsive" src="{{$value['videoStillURL']}}" alt="{{$value['name']}}" />
						</div>
					</a>
					
				</div>

				<div class="col-xs-6">

					<a href="/video/{{$value['id']}}/video-title">{{$value['name']}}</a>
					<p>Views: {{$value['playsTotal']}}</p>

				</div>

			</div>


		@endforeach

		<p><a class="loadmore popular-videos">Load More</a></p>


	</div>

</div>
