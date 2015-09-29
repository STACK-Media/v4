
@extends('theme::layouts.two_column')

@section('content-widgets')

<article>

	<h1>{!! $page->name !!}</h1>

	<article>
		
		@if(isset($page->meta['userphoto_image_file']))

			<img alt="{!! $page->name !!}" src="http://blog.stack.com/wp-content/uploads/userphoto/{!! $page->meta['userphoto_image_file'] !!}" class="pull-left">

		@endif
		
		<p>{!! $page->meta['description'] !!}</p>

		@if(@$page->meta['social'])

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
		
		
		<div data-template="latest-videos-block" data-name="4" class="row block event" data-viewport="true">

			<div class="col-xs-12 col-sm-6">

				<a href="{!! routelink('article', array('slug' => $post->slug)) !!}">
					<img alt="{!! $post->name !!}" class="img-responsive" data-src="" src="{!! $post->image !!}">
				</a>

			</div>

			<div class="col-xs-12 col-sm-6">

				<h3>
					<a href="{!! routelink('article', array('slug' => $post->slug)) !!}">
						{!! $post->name !!}
					</a>
				</h3>

				<?php
				$excerpt = strip_tags($post->post_content);

				if (strlen($excerpt) > 180):

					$excerpt = substr($excerpt, 0, strpos($excerpt, ' ', 180)) . '...';

				endif;

				?>

				<p>{!! $excerpt !!}</p>

			</div>

		</div>

	@endforeach


@stop