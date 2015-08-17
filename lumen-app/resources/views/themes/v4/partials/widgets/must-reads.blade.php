{!! Assets::queue('stylesheet',  'widgets', 'must-reads', '/assets/css/widgets/must-reads.css') !!}

<section>

	<div class="row must-reads">

		<div class="col-xs-12">

			<h2>Must-Reads</h2>

			<div id="accordion" class="ui-accordion ui-widget ui-helper-reset">
				
				@foreach ($articles AS $title => $links)

					<h3 class="ui-accordion-header ui-helper-reset ui-state-default ui-corner-top ui-accordion-icons">{{$title}}</h3>
					
					<div class="ui-accordion-content ui-helper-reset ui-widget-content ui-corner-bottom">

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