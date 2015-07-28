{!! Assets::queue('stylesheet',  'partials', 'block', '/assets/css/block.css') !!}

<div class="row block event" data-name="{{$key}}" data-template="{{$widget}}-block">

	<div class="col-xs-12 col-sm-6">

		<a href="{{$url}}">
			@include('theme::partials.img',
				array(
					'src' 	=> $image, 
					'alt' 	=> $title,
					'class'	=> 'img-responsive {{$class}}'
				)
			)
		</a>

	</div>

	<div class="col-xs-12 col-sm-6">

		<h3>
			<a href="{{$url}}">
				{{$title}}
			</a>
		</h3>

		<p>{{$description}}</p>

	</div>

</div>