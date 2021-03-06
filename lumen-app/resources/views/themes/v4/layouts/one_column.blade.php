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
	

	@include('theme::partials.navbar')
	
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
		
		<main role="main" class="col-xs-12" id="content">

			@yield('content')

			<div id="after-content" class="content-widgets">

				@yield('content-widgets')

			</div>

		</main>


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