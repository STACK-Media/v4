{!! Assets::queue('stylesheet',  'widgets', 'magazine-issues', '/assets/css/widgets/magazine-issues.css') !!}

<section class="magazine_issues_block">
	<div class="row">
		<div class="col-xs-12">
			<h3>Magazine Issues</h3>
		</div>

		<div id="magazineCarousel" class="carousel slide" data-ride="">

			<!-- Indicators --
			<ol class="carousel-indicators">

				<?php
				// count issues and divide by 3 to get # of slides needed
				for ($i=0;$i<(count($issues)/3);$i++):
					$slider_active_class 	= ($i ==0)? 'active': '';
				?>

					<li data-target="#magazineCarousel" data-slide-to="{{$i}}" class="{{$slider_active_class}}"></li>

				<?php
				endfor;
				?>

			</ol>
			-->

			<div class="carousel-inner" role="listbox">

				@foreach ($issues AS $key => $value)

					<?php
					$slider_active_class 	= ($key == 0)? 'active': '';
					?>

					<?php
					// open item
					if (($key % 3) == 0)
						echo '<div class="item '.$slider_active_class.'">';
					?>

						<div class="col-xs-12 col-md-4">

							<a href="/flipbook/{{$value->slug}}/index.php">
								<img class="img-responsive" src="{{$value->image}}" alt="{{$value->name}}" />
								<div class"carousel-caption">
									<p>{{$value->name.': '.$value->athlete}}</p>
								</div>
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
			<a class="left carousel-control" href="#magazineCarousel" role="button" data-slide="prev">
				<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
				<span class="sr-only">Previous</span>
			</a>
			<a class="right carousel-control" href="#magazineCarousel" role="button" data-slide="next">
				<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
				<span class="sr-only">Next</span>
			</a>

		</div>

	</div>
</section>



