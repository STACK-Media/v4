{!! Assets::queue('stylesheet', 'widgets', 'newsletter', '/assets/css/widgets/newsletter.css') !!}

<div class="row">

	<div class="col-xs-12">

		<h3>Newsletter</h3>

		<div id="newsletter-form">

			<p><span>FREE</span> training advice sent right to your inbox</p>

			<form action="" method="post" id="NewsletterForm">
				<input type="text" placeholder="Email" id="EmailValue" name="EmailValue"/>
				<input type="button" id="emailNewsletterSubmit" value="Sign Up"/>
				<input type="hidden" id="formType" name="formType" value="NewsletterSidebar"/>
			</form>

			<div id="newsletterMessage" class="newsletterSuccessMessage"></div>

		</div>

	</div>

</div>