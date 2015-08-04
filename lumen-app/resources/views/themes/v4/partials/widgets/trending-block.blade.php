{!! Assets::queue('javascript',  'widgets', 'loadmore', '/assets/js/loadmore.js') !!}
{!! Assets::queue('stylesheet',  'widgets', 'trending-block', '/assets/css/widgets/trending-block.css') !!}

<div class="row">

	<div class="col-xs-12">

		<h3>Trending</h3>

		@foreach($trending as $key => $value)

			<?php $class = ($key < 3) ? '': 'hidden'; ?>

			<div class="event trending-block {{$class}} event" data-name="{{$key}}" data-template="trending-block">

				<a href="{{$value['link']}}">
					@include('theme::partials.img',
						array(
							'src' 	=> $value['image'], 
							'alt' 	=> $value['title'],
							'class'	=> 'img-responsive'
						)
					)
					<h3>{{$value['title']}}</h3>
				</a>

			</div>

		@endforeach

	</div>

	<div class="clearfix"></div>

	<div class="col-sm-6 col-sm-offset-3">
		<p><a class="loadmore" data-loadmore="trending-block">Load More</a></p>
	</div>

</div>