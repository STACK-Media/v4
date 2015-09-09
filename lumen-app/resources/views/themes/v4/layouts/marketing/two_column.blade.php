@section('content-widgets')
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
@stop

@section('header')
	
	@include('theme::partials.header')

@stop
@section('navbar')
	

	@include('theme::partials.navbar-nolinks')
	
	<div class="container" id="oas_Top_container">
		@include('theme::partials.bannerad', array('position' => 'leader', 'args' => array()))
	</div>

@stop


@yield('header')

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

</div>

@include('theme::partials.footer')