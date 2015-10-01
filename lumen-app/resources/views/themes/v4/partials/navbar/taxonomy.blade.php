
@if(isset($menu_data['data']['articles']))

	<div class="row">

		@foreach($menu_data['data']['articles'] as $article)
			
			<?php
			// determine how many colums to display
			$cols 	= (count($menu_data['data']['articles']) > 3)? 'col-sm-3': 'col-sm-4';
			?>

			@if (property_exists($article,'slug'))

				<div class="{{$cols}}">
					<a class="nav-post" href="{!! routelink('article', array('slug' => $article->slug)) !!}">
						<img src="{!! $article->image !!}" class="img-responsive"/>
						<span>{!! $article->name !!}</span>
					</a>
				</div>

			@endif

		@endforeach

	</div>

@endif	