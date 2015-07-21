@section('content-widgets')
	
	<?php // iterate content widgets ?>
	@if(isset($widgets['content']))

		@foreach ($widgets['content'] AS $widget => $wdata)

			<div class="row event widget" data-name="content-<?php echo $widget; ?>" data-template="{{$template or "default"}}">

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

		<div class="row">

			@foreach ($widgets['sidebar'] AS $widget => $wdata)

				<?php 
				$num_widgets++; 

				$headroom_class = '';

				?>

				<div class="event widget" data-name="sidebar-{{$widget}}" data-template="{{$template or "default"}}">

					<div class="col-xs-12 col-sm-6 col-md-12">

						<div class="dashed-bottom legroom {{$headroom_class}}">

							@include('theme::partials.widgets.'.$widget, $wdata)		

						</div>

					</div>

				</div>

			@endforeach

		</div>

	@endif

@stop


@section('post-content-widgets')

	<?php // iterate post content widgets ?>
	@if(isset($widgets['post_content']))

		@foreach ($widgets['post_content'] AS $widget => $wdata)

			<div class="row event widget" data-name="postcontent-{{$widget}}" data-template="{{$template or "default"}}">

				<div class="col-lg-12">

					@include('theme::partials.widgets.'.$widget, $wdata)		

				</div>

			</div>

		@endforeach

	@endif

@stop


@include('theme::partials.header')


<div class="container">
	
	<div class="col-lg-12">

		@include('theme::partials.navbar')

	</div>

</div>

<div class="container">

	<div class="panel headroom">
		
		<div class="col-xs-12 col-md-8 col-lg-8" id="content">

			<div>

				@yield('content')

			</div>

			<div id="after-content" class="content-widgets">

				@yield('content-widgets')

			</div>

		</div>

		<!-- Sidebar -->
		<div class="col-xs-12 col-md-4 col-lg-4" id="sidebar">

			@yield('sidebar-widgets')

		</div>


		<div class="col-xs-12 content-widgets" id="post-content">

			@yield('post-content-widgets')

		</div>	

		<div class="clearfix"></div>			

	</div>		

	<div class="footer headroom legroom">

		@include('theme::partials.foot')

	</div>	

</div>


@include('theme::partials.footer')