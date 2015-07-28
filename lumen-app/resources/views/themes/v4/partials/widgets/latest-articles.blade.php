{!! Assets::queue('stylesheet',  'widgets', 'latest-articles', '/assets/css/widgets/latest-articles.css') !!}

<div class="row">

	<div class="col-xs-12 latest-articles event" data-name="0" data-template="latest-articles">

		<h3>Latest Articles in <?php echo implode(' & ',$category); ?></h3>

		@foreach($articles as $key => $article)

			@include('theme::partials.block-reverse',
				array(
					'key'			=> $key,
					'widget'		=> 'latest-articles',				
					'title' 		=> $article->name, 
					'image' 		=> $article->image,
					'description'	=> $article->post_excerpt,
					'url'			=> routelink('article', array( 'slug' => $article->slug)),
					'class'			=> 'block-article'				
				)
			)

		@endforeach

	</div>

</div>