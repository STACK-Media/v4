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
			
			<div id="navbar" class="collapse navbar-collapse">

				<div id="toplinks" class="pull-right hidden-sm hidden-xs">
					
					<a class="right_five" href="{!! routelink('home') !!}">Home</a> //                     
					
					<span class="edition_toggle">
						
						Edition:
						
						<a class="active right_five" href="http://www.stack.com/">USA</a>
						
						<span class="subsite_list">

							<span class="navtoggler">More</span>

							<span class="navtogglee">
								<a href="http://www.stackactive.com/">ASIA</a>
								<a href="http://cn.stackactive.com/">CHINA</a>
								<a href="http://hk.stackactive.com/">HONG KONG</a>
								<a href="http://ph.stackactive.com/">PHILIPPINES</a>
							</span>

						</span>

					</span>

					//

					<span class="subsite_list partners">

						<span class="navtoggler">Partner Sites</span>

						<span class="navtogglee">
							<a href="http://www.foxsports.com" target="_blank">Fox Sports</a>
							<a href="http://www.yardbarker.com" target="_blank">YardBarker</a>
							<a href="http://www.eastbay.com" target="_blank">Eastbay</a>
							<a href="http://www.footlocker.com" target="_blank">Footlocker</a>
							<a href="http://sports.yahoo.com" target="_blank">Yahoo! Sports</a>
						</span>

					</span>

				</div>

				<ul class="nav navbar-nav">
				
					@foreach($page->nav as $menu)
					
						<?php 

						$url          = (isset($menu['url']) ? $menu['url'] : ''); 
						$menu_data    = $menu;
						$submenu_cols = (view()->exists('theme::partials.navbar.'.$menu['type'])) ? 9 : 0; 

						unset($menu_data['submenu']); 
						
						?>

						<li class="menu-item-{!! preg_replace("/[^a-z0-9]/", '', strtolower($menu['name'])) !!} menu-type-{!! $menu['type'] !!}">					
							<a href="{!! $url !!}">{!! $menu['name'] !!}</a>

							<div class="menu-inner">

								<div class="row">

									<div class="submenu col-sm-{!! (12 - $submenu_cols) !!}" data-cols="{!! $submenu_cols !!}">

										@if(isset($menu['submenu']))

											<ul>

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

										@endif

									</div>

									@if(view()->exists('theme::partials.navbar.'.$menu['type']))
											
										<div class="menu-preview col-sm-{!! $submenu_cols !!}">

											<div class="menu-main-content">						
												
												@include('theme::partials.navbar.'.$menu['type'], array('menu_data' => $menu_data))

											</div>

											<div class="menu-submenu-content">

											</div>

										</div>

									@endif

									<div class="clearfix"></div>

								</div>

							</div>

						</li>

					@endforeach

				</ul>

			</div>

		</div>

	</nav>	

</div>