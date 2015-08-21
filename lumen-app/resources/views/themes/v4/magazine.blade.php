@extends('theme::layouts.two_column')

{!! Assets::queue('stylesheet', 'layout', 'magazine', '/assets/css/magazine.css') !!}
{!! Assets::queue('javascript', 'layout', 'magazine', '/assets/js/magazine.js') !!}

@section('content')

	<div class="row magazine footroom">

		<div class="col-xs-12">

			<select class="magazine-dropdown">
	
				<option value="">Choose an Issue</option>

				@foreach ($page->issues AS $key => $value)

					<option value="{{$value->slug}}">{{$value->name.': '.$value->athlete}}</option>

				@endforeach

			</select>

		</div>

		<div class="col-xs-12">
			<h1>STACK Magazine</h1>
		</div>

		<div class="col-xs-12 col-sm-6">
			@include('theme::partials.img',
				array(
					'src' 	=> $page->image, 
					'alt' 	=> $page->name,
					'class'	=> 'img-responsive'
				)
			)
		</div>

		<div class="col-xs-12 col-sm-6">

			<h2>From The Current Issue</h2>

			@foreach ($page->articles AS $key => $value)

				<p>
					<a href="{!! routelink('article', array('slug' => $value->slug)) !!}">
						{{$value->title}}
					</a>
					{{$value->description}}
				</p>

			@endforeach

		</div>

	</div>

@stop