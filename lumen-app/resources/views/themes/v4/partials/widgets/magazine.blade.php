{!! Assets::queue('stylesheet',  'widgets', 'magazine', '/assets/css/widgets/magazine.css') !!}

<div class="row">

	<div class="col-xs-12">

		<h3>Current Issue</h3>

		<div id="magazine">
			
			<a href="{{$magazine['url']}}" target="_blank">
				@include('theme::partials.img',
					array(
						'src' 		=> Assets::themed($magazine['img']), 
						'alt' 	=> $magazine['title'],
						'class'	=> 'img-responsive'
					)
				)
			</a>

			<ul>

				@foreach($magazine['articles'] as $key => $value)

					<li>
						<a href="{{$value['url']}}"> <?php //  alt="{{$value['title']}}" ?>
							{{$value['title']}}
						</a>
					</li>

				@endforeach

			</ul>

		</div>

	</div>

</div>