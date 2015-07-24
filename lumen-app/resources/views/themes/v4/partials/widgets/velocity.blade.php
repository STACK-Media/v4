{!! Assets::queue('stylesheet',  'widgets', 'velocity', '/assets/css/widgets/velocity.css') !!}

<div class="row">

	<div class="col-xs-12">

		<div class="velocity">
			<h2>Train like a pro</h2>
			<h3>Find a training center near you</h3>
			<form action="http://www.velocitysp.com/find_a_location" method="POST" class="velocity-form">
				<input type="text" name="zipcode" placeholder="Enter your zip code" class="placeholder">
				<input type="submit" value="GO">
			</form>
			<div class="velocity-logo"></div>
		</div>

	</div>

</div>