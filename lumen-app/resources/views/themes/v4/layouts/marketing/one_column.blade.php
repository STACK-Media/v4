@section('content-widgets')
@stop

@section('sidebar-widgets')
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
		
		<main role="main" class="col-xs-12" id="content">

			@yield('content')

		</main>

		<div class="col-xs-12 col-md-8 col-lg-8 content-widgets" id="post-content">

			<div id="after-content" class="content-widgets">

				@yield('content-widgets')

			</div>

		</div>	

		<!-- Sidebar -->
		<aside class="col-xs-12 col-md-4 col-lg-4" id="sidebar">

			@yield('sidebar-widgets')

		</aside>

		<div class="col-xs-12">

			@yield('post-content-widgets')

		</div>


		<div class="clearfix"></div>	

	</div>		

</div>

@include('theme::partials.footer')