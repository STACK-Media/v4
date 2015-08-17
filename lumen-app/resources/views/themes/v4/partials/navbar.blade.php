<div class="container">

	<!-- Navbar -->
	<nav class="navbar navbar-inverse bottom-red legroom">

		<div class="container-fluid">

			<div class="navbar-header">

				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>

				<a class="navbar-brand" href="{!! routelink('home', array()) !!}">
					<img alt="STACK" src="/assets/img/branding/logos/large_white.png" width="160" height="35">
				</a>
			</div>
			
			<div id="navbar" class="navbar-collapse collapse">

				<ul class="nav navbar-nav">
				
					@foreach($page->nav as $menu)
					
						<?php 

						$url       = (isset($menu['url']) ? $menu['url'] : ''); 
						$dropclass = (isset($menu['submenu'])) ? 'dropdown' : '';
						$menu_data = $menu;
						unset($menu_data['submenu']); ?>

						<li class="menu-type-{!! $menu['type'] !!} {!! $dropclass !!}">
							
							@if(isset($menu['submenu']))

								<a href="{!! $url !!}" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{!! $menu['name'] !!}</a>

								<ul class="submenu dropdown-menu">

								@foreach($menu['submenu'] as $submenu)
				
									<?php $surl = (isset($submenu['url']) ? $submenu['url'] : ''); ?>

									<li class="menu-type-{!! $submenu['type'] !!}">

										<a href="{!! $surl !!}">{!! $submenu['name'] !!}</a>
										
										<div class="menu-preview">

											@if(view()->exists('theme::partials.navbar.'.$submenu['type']))

												@include('theme::partials.navbar.'.$submenu['type'], array('menu_data' => $submenu))

											@endif

										</div>

									</li>

								@endforeach

								</ul>

							@else

								<a href="{!! $url !!}">{!! $menu['name'] !!}</a>

							@endif

							@if(view()->exists('theme::partials.navbar.'.$menu['type']))
								
								<div class="menu-preview">								
									
									@include('theme::partials.navbar.'.$menu['type'], array('menu_data' => $menu_data))

								</div>

							@endif

							

						</li>

					@endforeach

				</ul>

			</div>

		</div>

	</nav>	

</div>