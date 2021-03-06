{!! Assets::queue('javascript',  'widgets', 'loadmore', '/assets/js/loadmore.js') !!}

@if(isset($playlist['videos']))

	<div class="row">

		<div class="col-xs-12">

			<h3>Featured Videos</h3>

			@foreach($playlist['videos'] as $key => $value)

				<?php $class = ($key < 3) ? '': 'hidden'; ?>

				<div class="event featured-videos {{$class}} event" data-name="{{$key}}" data-template="featured-videos">

					<a href="{!! routelink('video', array('id' => $value['id'], 'slug' => $value['slug'])) !!}">
						<div class="img-block">
							@include('theme::partials.img',
								array(
									'src' 	=> $value['videoStillURL'], 
									'alt' 	=> $value['name'],
									'class'	=> 'img-responsive'
								)
							)
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

@endif