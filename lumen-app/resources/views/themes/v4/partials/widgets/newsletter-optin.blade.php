{!! Assets::queue('stylesheet', 'widgets', 	'newsletter', 	'/assets/css/widgets/newsletter-optin.css') !!}
{!! Assets::queue('javascript', 'global', 'api', 			'/assets/js/api.js') !!}
{!! Assets::queue('javascript', 'widgets', 	'newsletter', 	'/assets/js/widgets/newsletter-optin.js') !!}

<div class="row">

	<div class="col-xs-12 newsletter-optin">

		<h3>Newsletter</h3>

		<div id="newsletter-form">

			<p><span>FREE</span> training advice sent right to your inbox</p>

			<form action="" method="post" class="esp-optin">
				<input type="text" 		name="email" 			placeholder="Email" 		class="esp-email" 	id="EmailValue" />
				<input type="button" 	name="submit" 			value="Sign Up" 			class="esp-submit" 	id="emailNewsletterSubmit" />
				<input type="hidden" 	name="source" 			value="newsletter-optin" />
				<input type="hidden" 	name="lists[Master]" 	value="1" />
				<input type="hidden" 	name="vars[source]"		value="newsletter-optin" />
			</form>

			<div class="esp-message error"></div>

		</div>

	</div>

</div>