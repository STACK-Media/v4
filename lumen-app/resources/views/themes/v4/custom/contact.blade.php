@extends('theme::layouts.two_column')

{!! Assets::queue('stylesheet', 'layout', 'contact', '/assets/css/custom/contact.css') !!}
{!! Assets::queue('javascript', 'global', 'api', 			'/assets/js/api.js') !!}
{!! Assets::queue('javascript', 'layout', 'contact', '/assets/js/custom/contact.js') !!}

@section('content')

	<section class="contact">
	
		<h1>Contact Us</h1>

		<div class="row">

			<div class="col-xs-12 footroom">
		
				<p>We want to know what you think of STACK! Select one of the links below to send your comments or questions to the intended STACK department.</p>

			</div>

			<div class="col-xs-12 headroom footroom">

				<form name="contact" class="contact-form">

					<div class="row">

						<div class="col-xs-0  col-sm-2">

							<p class="label">Name:</strong>

						</div>
						<div class="col-xs-12 col-sm-10">

							<input class="form-control" type="text" name="name" id="name" placeholder="Please enter your name" />

						</div>

					</div>

					<div class="row headroom">

						<div class="col-xs-0  col-sm-2">

							<p class="label">Email:</strong>

						</div>
						<div class="col-xs-12 col-sm-10">

							<input class="form-control contact-email" type="text" name="to" id="email" placeholder="Please enter your email" />

						</div>
						
					</div>

					<div class="row headroom">

						<div class="col-xs-0  col-sm-2"></div>
						<div class="col-xs-12 col-sm-10">

							<div class="input-group">
								<select name="department" id="department">

									<option>Letters To The Editor</option>
									<option>High School Registration</option>
									<option>Paid Subscriptions</option>
									<option>Business Development Opportunities</option>
									<option>Advertising/Marketing Opportunities</option>
									<option>Press</option>
									<option>Jobs</option>
									<option>Address Changes</option>
									<option>Current and Back Issues</option>
									<option>Other</option>

								</select>
							</div>

						</div>

					</div>

					<div class="row headroom">

						<div class="col-xs-0  col-sm-2"></div>
						<div class="col-xs-12 col-sm-10">

							<div class="input-group">
								<textarea rows="8" cols="30" placeholder="Enter your comments here"></textarea>
							</div>

						</div>

					</div>

					<div class="row headroom">

						<div class="col-xs-12 text-center">

							<button type="submit" class="btn btn-stack contact-submit">Send</button>

						</div>

					</div>

					<p class="contact-error text-center"></p>

				</form>

			</div>

			<div class="col-xs-12 headroom">

				<p><h2>If you want to just send us an email directly, click below:</h2></p>

				<p><a href="mailto:letters@stack.com">letters@stack.com</a></p>

			</div>

			<div class="col-xs-12 headroom">

				<p><h2>Or if you prefer the old-school route, here's our mailing address:</h2></p>

			</div>
		</div>

		<div class="row headroom">

			<div class="col-xs-12 col-sm-4 address">

				<p><strong>Cleveland</strong></p>
				<p>STACK</p>
				<p>1228 Euclid Avenue, #1000</p>
				<p>Cleveland, OH 44115</p>
				<p>(216) 861-7000</p>

			</div>
			<div class="col-xs-12 col-sm-4 address">

				<p><strong>New York City</strong></p>
				<p>STACK</p>
				<p>274 Madison Avenue, Suite 601</p>
				<p>New York, NY 10016</p>

			</div>
			<div class="col-xs-12 col-sm-4 address">

				<p><strong>Los Angeles</strong></p>
				<p>STACK</p>
				<p>2777 Bristol Street, STE B</p>
				<p>Costa Mesa, CA 92626</p>

			</div>
			<div class="col-xs-12 col-sm-4 address">

				<p><strong>Palo Alto</strong></p>
				<p>STACK</p>
				<p>530 Lytton Avenue, 2nd Floor</p>
				<p>Palo Alto, CA 94301</p>

			</div>

		</div>

	</section>

@stop