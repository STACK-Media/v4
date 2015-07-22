
<div class="row">

	<div class="col-xs-12">

		<h3>Current Issue</h3>

		<div id="magazine">
			
			<a href="{{$magazine['url']}}" target="_blank">
				<img class="img-responsive" src="{{$magazine['img']}}" data-src="{{$magazine['img']}}" alt="{{$magazine['title']}}">
			</a>

			<ul>

				@foreach($magazine['articles'] as $key => $value)

					<li>
						<a href="{{$value['url']}}" alt="{{$value['title']}}">
							{{$value['title']}}
						</a>
					</li>

				@endforeach

			</ul>

		</div>

	</div>

</div>