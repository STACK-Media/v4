<section data-name="related-links-widget">

	<div class="row">

		<?php
		if (isset($links['category']) AND is_array($links['category']) AND ! empty($links['category'])):
		?>

		<div class="col-xs-12 col-sm-4">

			<h3>More About Get Faster</h3>

			<ul>
				<li><a href="#">Link #1</a></li>
				<li><a href="#">Link #2</a></li>
				<li><a href="#">Link #3</a></li>
				<li><a href="#">Link #4</a></li>
			</ul>

		</div>

		<?php
		endif;


		if (isset($links['tag']) AND is_array($links['tag']) AND ! empty($links['tag'])):
		?>
		
		<div class="col-xs-12 col-sm-4">

			<h3>More About Speed Training</h3>

			<ul>
				<li><a href="#">Link #1</a></li>
				<li><a href="#">Link #2</a></li>
				<li><a href="#">Link #3</a></li>
				<li><a href="#">Link #4</a></li>
			</ul>

		</div>

		<?php
		endif;



		if (isset($links['video']) AND is_array($links['video']) AND ! empty($links['video'])):
		?>
		
		<div class="col-xs-12 col-sm-4">

			<h3>Other Great Videos</h3>

			<ul>
				<li><a href="#">Link #1</a></li>
				<li><a href="#">Link #2</a></li>
				<li><a href="#">Link #3</a></li>
				<li><a href="#">Link #4</a></li>
			</ul>

		</div>

		<?php
		endif;
		?>

	</div>


</section>