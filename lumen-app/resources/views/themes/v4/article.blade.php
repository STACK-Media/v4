
@extends('theme::layouts.two_column')


@section('content')


<article>

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

	<h1>
		{!! $page->name !!}
	</h1>
	
	<time datetime="{!! date('Y-m-d H:i',strtotime($page->post_date)) !!}">{!! date('F d, Y',strtotime($page->post_date)) !!}</time>

	<div id="article_content">

		@if(@$page->video)
	
			@include('theme::partials.videoplayers.'.$page->player['player_name'], $page->player['player_data'])

		@endif
		

		{!! $page->post_content !!}

		{{-- Need author block --}}

		{{-- Need "Topics:" block --}}

	</div>
	
</article>

@stop