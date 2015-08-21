{!! Assets::queue('stylesheet',  'widgets', 'magazine-issues', '/assets/css/widgets/magazine-issues.css') !!}

<section class="magazine_issues_block">
	<div class="row">
		<div class="col-xs-12">
			<h3>Magazine Issues</h3>
		</div>

		@foreach ($issues AS $key => $value)

			<div class="col-xs-12 col-md-4">

				<a href="/flipbook/{{$value->slug}}/index.php">
					@include('theme::partials.img',
						array(
							'src' 	=> $value->image, 
							'alt' 	=> $value->name,
							'class'	=> 'img-responsive'
						)
					)
					<p>{{$value->name.': '.$value->athlete}}</p>
				</a>

			</div>

		@endforeach

	</div>
</section>