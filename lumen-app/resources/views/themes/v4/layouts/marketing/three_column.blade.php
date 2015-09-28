@section('content-widgets')
@stop

@section('right-sidebar-widgets')
@stop

@section('left-sidebar-widgets')
@stop

@section('post-content-widgets')
@stop

@section('header')
	
	@include('theme::partials.header')

@stop
@section('navbar')
	

	@include('theme::partials.navbar-fortheathlete')
	
	<div class="container" id="oas_Top_container">
		@include('theme::partials.bannerad', array('position' => 'leader', 'args' => array()))
	</div>

@stop


@yield('header')

<header role="banner">

	@yield('navbar')

</header>

<div class="">

	<div class="panel headroom">

		<!-- Left Sidebar -->
		<aside class="col-xs-12 col-md-3" id="sidebar">

			@yield('left-sidebar-widgets')

		</aside>
		
		<main role="main" class="col-xs-12 col-md-6" id="content">

			@yield('content')

			<div id="after-content" class="content-widgets">

				@yield('content-widgets')

			</div>

		</main>

		<!-- Right Sidebar -->
		<aside class="col-xs-12 col-md-3" id="sidebar">

			@yield('right-sidebar-widgets')

		</aside>


		<div class="col-xs-12 content-widgets" id="post-content">

			@yield('post-content-widgets')

		</div>

		<div class="clearfix"></div>	

	</div>		

</div>

@include('theme::partials.footer')