@extends('theme::layouts.two_column')

{!! Assets::queue('stylesheet', 'layout', 'article', '/assets/css/article.css') !!}

@section('content')

<div>

	{{-- Need to add vertical to breadcrumb links --}}

	<div id="breadcrumb">

		<a href="{!! routelink('home') !!}">
			Home
		</a>

		@if(isset($page->taxonomy['category']))
			
			@foreach($page->taxonomy['category'] as $category)

				@if(isset($category->parent['name']))
					
					//
					<a href="{!! routelink('category', array('slug' => $category->parent['slug'] )) !!}">
						{!! $category->parent['name'] !!}
					</a>

				@endif
			
				//
				<a href="{!! routelink('category', array('slug' => $category->slug )) !!}">
					{!! $category->name !!}
				</a>

			@endforeach

		@endif

		@if(isset($page->taxonomy['post_tag']))
			
			@foreach($page->taxonomy['post_tag'] as $post_tag)

				@if(isset($post_tag->meta['tag_page_type']) && $post_tag->meta['tag_page_type'] == 'sport')
			
					//
					<a href="{!! routelink('tag', array('slug' => $post_tag->slug )) !!}">
						{!! $post_tag->name !!}
					</a>

				@endif

			@endforeach

		@endif

	</div>

	<article>

		<h1>
			{!! $page->name !!}
		</h1>
		
		<time datetime="{!! date('Y-m-d H:i',strtotime($page->post_date)) !!}">{!! date('F d, Y',strtotime($page->post_date)) !!}</time>

		<div id="article_content">

			@if(@$page->video)
		
				@include('theme::partials.videoplayers.'.$page->player['player_name'], $page->player['player_data'])

			@endif
			

			{!! $page->post_content !!}



			<div id="author">

				<a href="{!! routelink('author', array('slug' => $page->author['slug'])) !!}" class="pull-left">

					@include('theme::partials.img',
						array(
							'src' 	=> ( ! isset($page->author['meta']['userphoto_image_file']) ? '' : 'http://blog.stack.com/wp-content/uploads/userphoto/'.$page->author['meta']['userphoto_image_file']),
							'alt' 	=> $page->author['name'],
							'class'	=> ''
						)
					)

				</a>


				<a href="{!! routelink('author', array('slug' => $page->author['slug'])) !!}">
					{{$page->author['name']}}
				</a>
				
				<?php
				$excerpt = $page->author['meta']['description'];

				if (strlen($excerpt) > 180):

					$excerpt = substr($excerpt, 0, strpos($excerpt, ' ', 180)) . '...';

				endif;

				?>

				- {{ $excerpt }}
				
				<br>
				
				<a href="/stack-expert-contributor-program/" target="_blank" alt="STACK Expert Contribution Program">Become a Contributing Expert</a>

				<div class="clearfix"></div>

			</div>



			{{-- Need "Topics:" block --}}

		</div>

	</article>
	
</div>

<?php 
/*
'lacrossesection',
     'basketballsection',
     'trainingsection',
     'strengthtraining',
     'getfastersection',
     'sportsskillssection',
     'flexibilitysection',
     'sportsinjuriessection',
     'axonsportssection'
 */
// show Bottom2 if article has above
?>
@stop