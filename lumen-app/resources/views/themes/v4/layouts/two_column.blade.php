
@include('theme::partials.header')

<div class="row">

	<div class="col-lg-offset-2 col-lg-8 main">

		<div class="row">

			<div class="col-lg-12">

				@include('theme::partials.navbar')

			</div>

		</div>

		<div class="row legroom event" data-name="adunit-Top" data-template="{{$template or "default"}}">

			<div class="col-lg-12">

				<?php //include('widget/Top.php'); ?>

			</div>

		</div>

		<div class="row panel headroom">

			<div class="col-xs-12 col-sm-8 col-lg-8">

				@yield('content-widgets')


				<?php // wtf is this matt ?>
				<div class="spacer"></div>		

			</div>

			<!-- Sidebar -->
			<div class="col-xs-12 col-sm-4 col-lg-4 sidebar">

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

</div>