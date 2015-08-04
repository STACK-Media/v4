{!! Assets::queue('stylesheet',  'widgets', 'author', '/assets/css/widgets/author.css') !!}

<section data-name="author-widget">

	<div class="row headroom author-widget">

		<div class="col-xs-2">

			<a href="{!! routelink('article', array('slug' => $author['username'])) !!}">
			
				@include('theme::partials.img',
					array(
						'src' 	=> $image, 
						'alt' 	=> $author['name'],
						'class'	=> 'img-responsive'
					)
				)

			</a>
		</div>

		<div class="col-xs-10">

			<a href="{!! routelink('article', array('slug' => $author['username'])) !!}">
				{{$author['name']}}
			</a> - {{$meta['description']['value']}}
			<br>
			<a href="http://www.stack.com/stack-expert-contributor-program/" target="_blank" alt="STACK Expert Contribution Program">Become a Contributing Expert</a>

		</div>


	</div>

</section>