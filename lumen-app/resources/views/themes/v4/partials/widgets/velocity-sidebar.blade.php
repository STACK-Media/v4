{!! Assets::queue('stylesheet',  'widgets', 'velocity-sidebar', '/assets/css/widgets/velocity-sidebar.css') !!}

<section data-name="velocity-sidebar">

	<div class="row headroom">

		<div class="col-xs-12">

			<div class="velocity-sidebar">
				<header>
					<h2>Training Centers</h2>
				</header>
				<h1>FIND A STACK VELOCITY SPORTS<br> 
				PERFORMANCE LOCATION NEAR YOU</h1>
				<form action="http://www.velocitysp.com/find_a_location" method="POST" target="_blank">
				  <input type="text" name="zipcode" placeholder="Enter your zip code" class="placeholder">
				  <input class="submit_vsp" type="submit" value="GO">
				</form>
			</div>

		</div>

	</div>

</section>