
@extends('theme::layouts.two_column')


@section('content')


<article>

	{{-- Need to add vertical to breadcrumb links --}}

	<div id="breadcrumb">

		<a href="{!! routelink('home') !!}">
			Home
		</a>
		
		@foreach($page->taxonomy['category'] as $category)
		//
		<a href="/category/{!! $category->slug !!}">
			{!! $category->name !!}
		</a>

		@endforeach

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