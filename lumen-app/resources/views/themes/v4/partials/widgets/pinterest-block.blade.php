{!! Assets::queue('stylesheet',  'widgets', 'pinterest-block', '/assets/css/widgets/pinterest-block.css') !!}

<div class="row pinterest-block-content">

	@foreach($pinterest as $key => $value)

		<?php 
		$width 	= (rand(0,2)==0) ? 'col-xs-6': 'col-xs-3'; 
		
		$height	= (rand(0,3) == 0)? 'h3': 'h2';
		$height	= ($key == 1)? 'h1': $height;
		?>

		<div class="{{$width}} {{$height}}">

			<div class="event pinterest-block event" data-name="{{$key}}" data-template="pinterest-block">

				<a href="{!! routelink('article', array('slug' => $value['link'])) !!}">
					@include('theme::partials.img',
						array(
							'src' 	=> $value['image'], 
							'alt' 	=> $value['title'],
							'class'	=> 'img-responsive'
						)
					)
				</a>

			</div>

		</div>

	@endforeach

</div>