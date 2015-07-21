
<div class="row">

	<div class="col-xs-12">

		<h3>Current Issue</h3>

		<div class="">
			
			<a href="{{$magazine['url']}}" target="_blank">
				<img class="img-responsive" src="{{$magazine['img']}}" data-src="{{$magazine['img']}}" alt="{{$magazine['title']}}">
			</a>

			<ul data-vr-zone="Sidebar Magazine">

				@foreach($magazine['articles'] as $key => $value)

					<li data-vr-contentbox="">
						<a href="{{$value['url']}}" alt="{{$value['title']}}">
							{{$value['title']}}
						</a>
					</li>

				@endforeach

			</ul>

		</div>

	</div>

</div>