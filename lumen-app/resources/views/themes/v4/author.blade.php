
@extends('theme::layouts.two_column')

@section('content-widgets')

<article>

	<h1>{!! $page->name !!}</h1>

	<article>

		<img alt="{!! $page->name !!}" src="http://blog.stack.com/wp-content/uploads/userphoto/733.jpg" class="pull-left">
		
		<p>{!! $page->meta['description'] !!}</p>

		@if($page->meta['social'])

			<p class="expert_social">
				<span>Follow at:</span> 

				@foreach($page->meta['social'] as $key => $site)
					<a target="_blank" href="{!! $site !!}" class="{!! strtolower($key); !!}">{!! $key !!}</a>
				@endforeach
			</p>

		@endif

		<p class="clearfix">
			<a href="#">Back to Experts List</a>
		</p>

	</article>

	
	@foreach($page->posts as $post)
		
		{!! var_export($post, TRUE) !!}

	@endforeach


@stop