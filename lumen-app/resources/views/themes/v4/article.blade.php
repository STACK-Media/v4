
@extends('theme::layouts.two_column')


@section('content-widgets')
	
	<?php // iterate content widgets ?>
	@foreach ($widgets['content'] AS $widget)

		<div class="row event" data-name="content-<?php echo $widget; ?>" data-template="{{$template or "default"}}">

			<div class="col-lg-12">
				
				@include('theme::partials.widgets.'.$widget)						

			</div>

		</div>		

	@endforeach	
	
@stop


@section('sidebar-widgets')

	<?php
	$num_widgets = 0;
	 // iterate sidebar widgets ?>
	@foreach ($widgets['sidebar'] AS $widget)

		<?php 
		$num_widgets++; 

		$headroom_class = 'headroom';

		if ($num_widgets === 1):

			$headroom_class = '';

		endif;

		?>

		<div class="row event" data-name="sidebar-{{$widget}}" data-template="{{$template or "default"}}">

			<div class="col-xs-12">

				<div class="dashed-bottom legroom {{$headroom_class}}">

					@include('theme::partials.widgets.'.$widget)		

				</div>

			</div>

		</div>

	@endforeach

@stop


@section('post-content-widgets')

	<?php // iterate post content widgets ?>
	@foreach ($widgets['post_content'] AS $widget)

		<div class="row event" data-name="postcontent-{{$widget}}" data-template="{{$template or "default"}}">

			<div class="col-lg-12">

				@include('theme::partials.widgets.'.$widget)		

			</div>

		</div>

	@endforeach

@stop