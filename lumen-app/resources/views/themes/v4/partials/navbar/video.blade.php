
@if(isset($menu_data['data']['videos']))

	<div class="row">

		@foreach($menu_data['data']['videos'] as $video)

			<?php
			// determine how many colums to display
			$cols 	= (count($menu_data['data']['videos']) > 3)? 'col-sm-3': 'col-sm-4';
			?>

			<div class="{{$cols}}">
				<a class="nav-post" href="{!! routelink('video', array('slug' => $video['slug'], 'id' => $video['id'])) !!}">
					<img src="{!! $video['videoStillURL'] !!}" class="img-responsive"/>
					<span>{!! $video['name'] !!}</span>
				</a>
			</div>

		@endforeach

	</div>

@endif	