@extends('theme::layouts.one_column')

{!! Assets::queue('stylesheet', 'layout', 'stack-velocity', '/assets/css/custom/stack-velocity.css') !!}

@section('content')

	<div id="main_content" class="vsp_home">
		<div id="logo">
			<img src="/assets/img/branding/logos/stack-velocity-large.jpg" class="img-responsive" alt="STACK Velocity" />
		</div>
		<div class="hero">
			<img src="/assets/img/branding/velocity/hero.jpg" class="img-responsive" alt="STACK Velocity Performance Centers" />
		</div>
		<section>
			<h1>More Than a Million Athletes Made Better</h1>
			<p>Over the past 15 years, more than one million youth, high school, college, pro and adult athletes have trained with our elite coaches at STACK Velocity Sports Performance facilities. Our innovative approach to customized training will help any athlete improve his or her game. As the nation’s 
			largest sports performance provider, we have training centers in almost all major markets. Get 
			better today by locating the facility nearest you and signing up for a free trial.</p>
		</section>
		<section>
			<div class="col-xs-12 col-sm-6 headroom footroom">
				<div class="vsp_bucket">
					<h2>Sign up for a Free Trial</h2>
					<p class="stack-velocity-text">Challenge yourself. Be the best <b>YOU</b> you can be. Start your <b>FREE</b> Trial today.</p>
					<div class="input_container">
						<form action="http://www.velocitysp.com/free_trial" method="GET" target="_blank">
							<input type="submit" value="TRY STACK VELOCITY NOW" ></input>
						</form>
					</div>
				</div>
			</div>
			<div class="col-xs-12 col-sm-6 headroom footroom">
				<div class="vsp_bucket">
					<h2>FIND A FACILTY</h2>
					<p class="stack-velocity-text">Enter your ZIP code below to find a STACK Velocity near you.</p>
					<div class="input_container">
						<form action="http://www.velocitysp.com/find_a_location" method="POST" target="_blank">
							<input type="text" name="zipcode" placeholder="Enter your zip code"></input>
							<input type="submit" value="FIND" class="short_btn"></input>
						</form>
					</div>
				</div>
			</div>
		</section>
	</div>

@stop