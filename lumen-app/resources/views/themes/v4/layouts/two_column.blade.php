
@include('theme::partials.header')

<div class="container">

	<div class="row legroom">

		<div class="col-lg-12">

			@include('theme::partials.navbar')

		</div>

	</div>

	<?php /*
	<div class="row event" data-name="adunit-Top" data-template="{{$template or "default"}}">

		<div class="col-lg-12">

			//include('widget/Top.php');

		</div>

	</div>

	*/ ?>

	<div class="row panel headroom">

		<div class="col-xs-12 col-md-8 col-lg-8">

			@yield('content-widgets')

		</div>

		<!-- Sidebar -->
		<div class="col-xs-12 col-md-4 col-lg-4 sidebar">

			@yield('sidebar-widgets')

		</div>


		<div class="col-xs-12">

			@yield('post-content-widgets')

		</div>				


	</div>		

	<div class="footer headroom legroom">

		@include('theme::partials.foot')

	</div>	

</div>


@include('theme::partials.footer')