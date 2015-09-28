@extends('theme::layouts.two_column')

{!! Assets::queue('stylesheet', 'layout', 'stack-originals', '/assets/css/custom/stack-originals.css') !!}

@section('content')

	<section class="stack-originals">

		<div class="col-xs-12 dashed">
			<h1>STACK Originals</h1>
			<p class="small"><i>View the latest original content created by STACK. From our exclusive Path to the Pros series that chronicles NFL Draft prospects to our STACK Performance Series, all of STACK's freshest, original content is available for your viewing pleasure.</i></p>
		</div>

		<div class="col-xs-12 footroom headroom dashed">
			<h1>Original Series</h1>

			<ul class="footroom">

				@foreach ($links AS $key => $value)

					<li><a href="{!! routelink('tag', array('slug' => $value['slug'])) !!}">{{$value['title']}}</a></li>
				
				@endforeach

			</ul>
		</div>

		<div class="col-xs-12 headroom">
			<h1>// Recent STACK Originals</h1>

			@foreach ($videos AS $key => $value)

				@include('theme::partials.block',
					array(
						'key'			=> $key,
						'widget'		=> 'stack-originals',				
						'title' 		=> $value['title'], 
						'image' 		=> $value['image'],
						'description'	=> $value['description'],
						'url'			=> routelink('video', array('slug' => $value['slug'], 'id' => $value['id'])),
						'class'			=> 'block-video',
						'author'		=> ''
					)
				)

			@endforeach

		</div>

	</section>


@stop