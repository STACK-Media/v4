{!! Assets::queue('stylesheet', 	'global',  'jquery-ui', 	'//ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css') !!}
{!! Assets::queue('javascript', 	'global',  'jquery-ui',		'/assets/third-party/jquery-ui/jquery-ui-1.11.4.min.js') !!}
{!! Assets::queue('javascript',  	'global', 	'accordion', 	'/assets/js/accordion.js') !!}
{!! Assets::queue('stylesheet',  	'widgets', 'must-reads', 	'/assets/css/widgets/must-reads.css') !!}

<section>

	<div class="row must-reads">

		<div class="col-xs-12">

			<h1>Must-Reads</h1>

			<div class="accordion">
				
				@foreach ($articles AS $title => $links)

					<h3>{{$title}}</h3>
					
					<div class="accordion-body">

						<ul>

							@foreach ($links AS $slug => $name)

								<li>
									<a href="{!! routelink('article', array('slug' => $slug)) !!}">
										{{$name}}
									</a>
								</li>

							@endforeach

						</ul>

					</div>

				@endforeach

			</div>

		</div>

	</div>

</section>