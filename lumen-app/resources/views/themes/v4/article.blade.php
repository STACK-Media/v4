
@extends('theme::layouts.two_column')


@section('content-widgets')
	
	<?php // iterate content widgets ?>
	@foreach ($content AS $widget)

		<div class="row event" data-name="content-<?php echo $widget; ?>" data-template="{{$template or "default"}}">

			<div class="col-lg-12">
				
				@include('theme::partials.widgets.'.$widget)						

			</div>

		</div>		

	@endforeach	
	
@stop


@section('sidebar-widgets')

	<?php // iterate sidebar widgets ?>
	@foreach ($sidebar AS $widget)

		<div class="row event" data-name="sidebar-{{$widget}}" data-template="{{$template or "default"}}">

			<div class="col-lg-12">

				@include('theme::partials.widgets.'.$widget)		

				<hr />

			</div>

		</div>

	@endforeach

@stop


@section('post-content-widgets')

	<?php // iterate post content widgets ?>
	@foreach ($post_content AS $widget)

		<div class="row event" data-name="postcontent-{{$widget}}" data-template="{{$template or "default"}}">

			<div class="col-lg-12">

				@include('theme::partials.widgets.'.$widget)		

			</div>

		</div>

	@endforeach

@stop