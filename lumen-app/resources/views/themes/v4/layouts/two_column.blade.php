@section('content-widgets')
	
	<?php // iterate content widgets ?>
	@if(isset($widgets['content']))

		@foreach ($widgets['content'] AS $widget => $wdata)

			<div class="row event widget legroom" data-name="content-<?php echo $widget; ?>" data-template="{{$template or "default"}}">

				<div class="col-lg-12">
					
					@include('theme::partials.widgets.'.$widget, $wdata)						

				</div>

			</div>		

		@endforeach	
		
	@endif
	
@stop
@section('sidebar-widgets')

	@include('theme::partials.bannerad', array('position' => 'sidebar-top', 'args' => array()))

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

				@if($num_widgets==2)
					
					</div>

					<div class="row">
						
						@include('theme::partials.bannerad', array('position' => 'sidebar-mid', 'args' => array()))
					
					</div>

					<div class="row">

				@endif

			@endforeach

		</div>

	@endif


	@include('theme::partials.bannerad', array('position' => 'sidebar-bottom', 'args' => array()))

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
@section('banner-bg')
	
	<div id="bannerbg">
		@include('theme::partials.bannerad', array('position' => 'background', 'args' => array()))
	</div>

@stop
@section('foot')

	@include('theme::partials.foot')

@stop
@section('header')
	
	@include('theme::partials.header')

@stop
@section('navbar')
	
	@if (isset($nav))
		@include('theme::partials.navbar')
	@endif

	<div class="container" id="oas_Top_container">
		@include('theme::partials.bannerad', array('position' => 'leader', 'args' => array()))
	</div>

@stop

<?php /*
@section('modal')
	
	@include('theme::partials.modal')

@stop
*/ ?>

@yield('header')

@yield('banner-bg')

<header role="banner">
	
	@yield('navbar')

</header>

<div class="container">

	<div class="panel headroom">
		
		<main role="main" class="col-xs-12 col-md-8 col-lg-8" id="content">

			@yield('content')

			<div id="after-content" class="content-widgets">

				@yield('content-widgets')

			</div>

		</main>

		<!-- Sidebar -->
		<aside class="col-xs-12 col-md-4 col-lg-4" id="sidebar">

			@yield('sidebar-widgets')

		</aside>


		<div class="col-xs-12 content-widgets" id="post-content">

			@yield('post-content-widgets')

		</div>	

		<div class="clearfix"></div>			

	</div>		

	<div class="footer headroom legroom">

		@yield('foot')

	</div>	

</div>

<?php /*
@yield('modal');
*/ ?>

@include('theme::partials.footer')