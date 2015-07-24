{!! Assets::queue('javascript',  'widgets', 'loadmore', '/assets/js/loadmore.js') !!}

<div class="row">

	<div class="col-xs-12">

		<h3>Most Popular Videos</h3>

		@foreach($playlist['videos'] as $key => $value)

			<?php $class 	= ($key < 3)? '': 'hidden'; ?>

			<div class="row event popular-videos {{$class}} event" data-name="{{$key}}" data-template="popular-videos">
				
				<div class="pad-right">

					<div class="col-xs-6 pull-left">

						<a href="{!! routelink('video', array('id' => $value['id'], 'slug' => 'video-title')) !!}">
							<div class="thumbnail">
								@include('theme::partials.img',
									array(
										'src' 	=> $value['videoStillURL'], 
										'alt' 	=> $value['name'],
										'class'	=> 'img-responsive'
									)
								)
							</div>
						</a>
						
					</div>

					<a href="{!! routelink('video', array('id' => $value['id'], 'slug' => 'video-title')) !!}">{{$value['name']}}</a>
					<p>Views: {{$value['playsTotal']}}</p>

					<div class="clearfix"></div>

				</div>

			</div>

		@endforeach

	</div>

	<div class="clearfix"></div>

	<div class="col-sm-6 col-sm-offset-3">
		<p><a class="loadmore" data-loadmore="popular-videos">Load More</a></p>
	</div>

</div>
