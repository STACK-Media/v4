{!! Assets::queue('stylesheet',  'widgets', 'sport-workouts', '/assets/css/widgets/sport-workouts.css') !!}

<section>

	<div class="row sport-workouts">

		<div class="col-xs-12">
			<h1>{{$sport['title']}} Workouts</h1>
		</div>

		<div id="sportCarousel" class="carousel slide" data-ride="" data-interval="false">

			<div class="carousel-inner" role="listbox">

				@foreach ($sport['articles'] AS $key => $value)

					<?php
					$slider_active_class 	= ($key == 0)? 'active': '';
					?>

					<?php
					// open item
					if (($key % 3) == 0)
						echo '<div class="item '.$slider_active_class.'">';
					?>

						<div class="col-xs-12 col-sm-4">

							<a href="{!! routelink('article', array('slug' => $value['slug'])) !!}">
								<img src="{{$value['img']}}" alt="{{$value['name']}}" class="img-responsive" />
								<h3>{{$value['name']}}</h3>
							</a>

						</div>

					<?php
					// close item
					if (($key % 3) == 2)
						echo '</div>';
					?>

				@endforeach

			</div>

			<!-- Left and right controls -->
			<a class="left carousel-control" href="#sportCarousel" role="button" data-slide="prev">
				<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
				<span class="sr-only">Previous</span>
			</a>
			<a class="right carousel-control" href="#sportCarousel" role="button" data-slide="next">
				<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
				<span class="sr-only">Next</span>
			</a>

		</div>

	</div>

</section>