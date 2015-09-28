@extends('theme::layouts.two_column')

{!! Assets::queue('stylesheet', 'layout', 'stack-beast', 	'/assets/css/custom/stack-beast.css') !!}
{!! Assets::queue('javascript', 'global', 'api', 			'/assets/js/api.js') !!}
{!! Assets::queue('javascript', 'layout', 'stack-beast', 	'/assets/js/custom/stack-beast.js') !!}

@section('content')

	<section class="beast-squad">
	
		<h1>Become a STACK Beast</h1>

		<div class="row">

			<div class="col-xs-12 footroom">
	
				@include('theme::partials.img',
					array(
						'src' 	=> '/assets/img/promotions/stack-beast.png', 
						'alt' 	=> 'STACK Beast',
						'class'	=> 'img-responsive'
					)
				)

			</div>

			<div class="col-xs-12">
				<p>Thank you for your interest in joining the STACK Beast Squad. STACK Beasts serve as ambassadors for our brand and are among the most influential, respected and accomplished athletes in their high schools.</p>
				<p>As a STACK Beast, you will provide firsthand insight and feedback to assist us in our mission of helping athletes get better.</p>
				<p>In return for your input and involvement, you will gain resume-building experience and access to exclusive content and product giveaways. In addition, you will have the opportunity to be featured in front of millions of other athletes in STACK Magazine and on STACK.com</p>
				<p>Please take a few minutes and fill out the form below. We will be in touch with you once we review your info.</p>
			</div>

			<div class="col-xs-12 headroom footroom">

				<form name="beast-squad" class="beast-squad-form" id="beast-squad-form">

					<input type="hidden" class="beast-squad-subject" name="params[subject]" value="STACK Beast Squad Form Submission" />

					<div class="row">

						<div class="col-xs-0  col-sm-4">

							<p class="label">Name:</strong>

						</div>
						<div class="col-xs-12 col-sm-8">

							<input class="form-control beast-squad-name" type="text" name="name" placeholder="Please enter your name" />

						</div>

					</div>

					<div class="row">

						<div class="col-xs-0  col-sm-4">

							<p class="label">Email:</strong>

						</div>
						<div class="col-xs-12 col-sm-8">

							<input class="form-control beast-squad-email" type="text" name="to" id="email" placeholder="Please enter your email" />

						</div>
						
					</div>

					<div class="row">

						<div class="col-xs-0  col-sm-4">

							<p class="label">Date of Birth:</strong>

						</div>
						<div class="col-xs-12 col-sm-8">

							<input class="form-control beast-squad-dob" type="text" name="dob" placeholder="e.g.: mm/dd/yyyy" />

						</div>

					</div>

					<div class="row">

						<div class="col-xs-0  col-sm-4">

							<p class="label">Gender:</strong>

						</div>
						<div class="col-xs-12 col-sm-8">

							<input class="form-control beast-squad-gender" type="text" name="gender" placeholder="Please enter your gender" />

						</div>

					</div>

					<div class="row">

						<div class="col-xs-0  col-sm-4">

							<p class="label">Graduation Year:</strong>

						</div>
						<div class="col-xs-12 col-sm-8">

							<input class="form-control beast-squad-graduation" type="text" name="graduation" placeholder="Please enter your graduation year" />

						</div>

					</div>

					<div class="row">

						<div class="col-xs-0  col-sm-4">

							<p class="label">Address Line 1:</strong>

						</div>
						<div class="col-xs-12 col-sm-8">

							<input class="form-control beast-squad-address" type="text" name="address" placeholder="Please enter your address" />

						</div>

					</div>

					<div class="row">

						<div class="col-xs-0  col-sm-4">

							<p class="label">Address Line 2:</strong>

						</div>
						<div class="col-xs-12 col-sm-8">

							<input class="form-control beast-squad-address2" type="text" name="address2" placeholder="Please enter your address 2" />

						</div>

					</div>

					<div class="row">

						<div class="col-xs-0  col-sm-4">

							<p class="label">City:</strong>

						</div>
						<div class="col-xs-12 col-sm-8">

							<input class="form-control beast-squad-city" type="text" name="city" placeholder="Please enter your city" />

						</div>

					</div>

					<div class="row">

						<div class="col-xs-0  col-sm-4">

							<p class="label">State:</strong>

						</div>
						<div class="col-xs-12 col-sm-8">

							<input class="form-control beast-squad-state" type="text" name="state" placeholder="Please enter your state" />

						</div>

					</div>

					<div class="row">

						<div class="col-xs-0  col-sm-4">

							<p class="label">Zip:</strong>

						</div>
						<div class="col-xs-12 col-sm-8">

							<input class="form-control beast-squad-zip" type="text" name="zip" placeholder="Please enter your zip code" />

						</div>

					</div>

					<div class="row">

						<div class="col-xs-0  col-sm-4">

							<p class="label">High School:</strong>

						</div>
						<div class="col-xs-12 col-sm-8">

							<input class="form-control beast-squad-high-school" type="text" name="high_school" placeholder="Please enter your High School" />

						</div>

					</div>

					<div class="row">

						<div class="col-xs-0  col-sm-4">

							<p class="label">Athletic Director:</strong>

						</div>
						<div class="col-xs-12 col-sm-8">

							<input class="form-control beast-squad-ad" type="text" name="athletic_director" placeholder="Please enter your Athletic Director" />

						</div>

					</div>

					<div class="row">

						<div class="col-xs-0  col-sm-4">

							<p class="label">Length of time you've been a fan of STACK:</strong>

						</div>
						<div class="col-xs-12 col-sm-8">

							<input class="form-control beast-squad-fan" type="text" name="stack_fan" placeholder="e.g.: 5 years" />

						</div>

					</div>

					<div class="row">

						<div class="col-xs-0  col-sm-4">

							<p class="label">Facebook URL:</strong>

						</div>
						<div class="col-xs-12 col-sm-8">

							<input class="form-control beast-squad-facebook" type="text" name="facebook" placeholder="(optional)" />

						</div>

					</div>

					<div class="row">

						<div class="col-xs-0  col-sm-4">

							<p class="label">Twitter URL:</strong>

						</div>
						<div class="col-xs-12 col-sm-8">

							<input class="form-control beast-squad-twitter" type="text" name="twitter" placeholder="(optional)" />

						</div>

					</div>

					<div class="row">

						<div class="col-xs-0  col-sm-4">

							<p class="label">Instagram URL:</strong>

						</div>
						<div class="col-xs-12 col-sm-8">

							<input class="form-control beast-squad-instagram" type="text" name="instagram" placeholder="(optional)" />

						</div>

					</div>

					<div class="row">

						<div class="col-xs-0  col-sm-4">

							<p class="label">SnapChat URL:</strong>

						</div>
						<div class="col-xs-12 col-sm-8">

							<input class="form-control beast-squad-snapchat" type="text" name="snapchat" placeholder="(optional)" />

						</div>

					</div>

					<div class="row">

						<div class="col-xs-0  col-sm-4">

							<p class="label">Other Social URL:</strong>

						</div>
						<div class="col-xs-12 col-sm-8">

							<input class="form-control beast-squad-other" type="text" name="other" placeholder="(optional)" />

						</div>

					</div>


					<div class="row headroom">

						<div class="col-xs-0  col-sm-4">
							<p class="label">Althletic Accomplishments (Awadrs, Recognition, Leadership Roles, etc):</p>
						</div>
						<div class="col-xs-12 col-sm-8">

							<div class="input-group">
								<textarea rows="8" cols="30" name="awards" class="beast-squad-awards" placeholder="Enter your Athletic Awards & Accomplishments  here"></textarea>
							</div>

						</div>

					</div>

					<div class="row headroom">

						<div class="col-xs-0  col-sm-4">
							<p class="label">Write a paragraph introducing yourself and explain why you would like to join the STACK Beast Squad</p>
						</div>
						<div class="col-xs-12 col-sm-8">

							<div class="input-group">
								<textarea rows="8" cols="30" name="comments" class="beast-squad-comments" placeholder="Enter any addiitonal comments here"></textarea>
							</div>

						</div>

					</div>

					<div class="row headroom">

						<div class="col-xs-12 text-center">

							<button type="submit" class="btn btn-stack beast-squad-submit">Send</button>

						</div>

					</div>

					<p class="beast-squad-error text-center"></p>

				</form>

			</div>

		</div>

	</section>

@stop