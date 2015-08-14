{!! Assets::queue('stylesheet',  'widgets', 'sport-workouts', '/assets/css/widgets/sport-workouts.css') !!}

<section>

	<div class="row sport-workouts">

		<div class="col-xs-12">
			<h2>{{$sport['title']}} Workouts</h2>
		</div>

		@foreach ($sport['articles'] AS $key => $value)

			<div class="col-xs-12 col-md-4">

				<a href="{!! routelink('article', array('slug' => $value['slug'])) !!}">
					@include('theme::partials.img',
						array(
							'src' 	=> $value['img'], 
							'alt' 	=> $value['name'],
							'class'	=> 'img-responsive'
						)
					)
					<h3>{{$value['name']}}</h3>
				</a>

			</div>

		@endforeach

	</div>

</section>