@extends('theme::layouts.two_column')

{!! Assets::queue('stylesheet', 'layout', 'stack-originals', '/assets/css/custom/stack-originals.css') !!}

@section('content')

	<section class="stack-originals">

		<div class="col-xs-12">
			<h1>STACK Originals</h1>
			<p class="small"><i>View the latest original content created by STACK. From our exclusive Path to the Pros series that chronicles NFL Draft prospects to our STACK Performance Series, all of STACK's freshest, original content is available for your viewing pleasure.</i></p>
		</div>

		<div class="col-xs-12 footroom">
			<h1>Original Series</h1>

			<ul class="footroom">
				<li><a href="{!! routelink('tag', array('slug' => 'all-eyes-on-us')) !!}">All Eyes on U.S.</a></li>
				<li><a href="{!! routelink('tag', array('slug' => 'chasing-greatness')) !!}">Chasing Greatness</a></li>
				<li><a href="{!! routelink('tag', array('slug' => 'ndamukong-rising')) !!}">Ndamukong Rising</a></li>
				<li><a href="{!! routelink('tag', array('slug' => 'path-to-the-pros')) !!}">Path to the Pros</a></li>
				<li><a href="{!! routelink('tag', array('slug' => 'stack-performance-series')) !!}">STACK Performance Series</a></li>
				<li><a href="{!! routelink('tag', array('slug' => 'the-short-stack')) !!}">The Short STACK</a></li>
			</ul>
		</div>

		<div class="col-xs-12 headroom">
			<h1>// Recent STACK Originals</h1>
		</div>

	</section>


@stop