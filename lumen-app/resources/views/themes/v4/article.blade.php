
@extends('theme::layouts.two_column')


@section('content-widgets')
	
	<?php // iterate content widgets ?>
	@if(isset($widgets['content']))

		@foreach ($widgets['content'] AS $widget => $wdata)

			<div class="row event" data-name="content-<?php echo $widget; ?>" data-template="{{$template or "default"}}">

				<div class="col-lg-12">
					
					@include('theme::partials.widgets.'.$widget, $wdata)						

				</div>

			</div>		

		@endforeach	
		
	@endif
	
@stop


@section('sidebar-widgets')

	<?php
	$num_widgets = 0;
	 // iterate sidebar widgets ?>
	@if(isset($widgets['sidebar']))

		@foreach ($widgets['sidebar'] AS $widget => $wdata)

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

						@include('theme::partials.widgets.'.$widget, $wdata)		

					</div>

				</div>

			</div>

		@endforeach

	@endif

@stop


@section('post-content-widgets')

	<?php // iterate post content widgets ?>
	@if(isset($widgets['post_content']))

		@foreach ($widgets['post_content'] AS $widget => $wdata)

			<div class="row event" data-name="postcontent-{{$widget}}" data-template="{{$template or "default"}}">

				<div class="col-lg-12">

					@include('theme::partials.widgets.'.$widget, $wdata)		

				</div>

			</div>

		@endforeach

	@endif

@stop