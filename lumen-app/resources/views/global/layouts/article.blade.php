<?php

// set dummy widgets
$content 	= array(
	'player',
	'article',
	'author',
	'must-see',
	'zergnet',
	'outbrain'
);

$sidebar 	= array(
	'featured-videos',
	'newsletter',
	'popular-videos',
	'trending-block',
	'outbrain-sidebar'
);

$post_content 	= array(
	'pinterest',
	'recommended'
);


echo view('theme::partials.header');
?>


<div class="row condom">

	<div class="col-lg-2"></div>

	<div class="col-lg-8 main">

		<div class="row">

			<div class="col-lg-12">

				<?php
				echo view('theme::partials.navbar');
				?>

			</div>

		</div>

		<div class="row legroom event" data-name="adunit-Top" data-template="<?php echo @$template; ?>">

			<div class="col-lg-12">

				<?php //include('widget/Top.php'); ?>

			</div>

		</div>

		<div class="row panel headroom">

			<div class="col-xs-12 col-sm-8 col-lg-8">

				<?php
				// iterate content widgets
				foreach ($content AS $widget):
				?>

					<div class="row event" data-name="content-<?php echo $widget; ?>" data-template="<?php echo @$template; ?>">

						<div class="col-lg-12">
							
							<?php 
							echo view('theme::partials.widgets.'.$widget);
							?>						

						</div>

					</div>		

				<?php
				endforeach;
				?>		

				<div class="spacer"></div>		

			</div>

			<!-- Sidebar -->
			<div class="col-xs-12 col-sm-4 col-lg-4 sidebar">

				<?php
				// iterate sidebar widgets
				foreach ($sidebar AS $widget):
				?>

					<div class="row event" data-name="sidebar-<?php echo $widget; ?>" data-template="<?php echo @$template; ?>">

						<div class="col-lg-12">

							<?php 
							echo view('theme::partials.widgets.'.$widget);
							?>		

							<hr />

						</div>

					</div>

				<?php
				endforeach;
				?>

			</div>


			<div class="col-xs-12">
				
				<?php
				// iterate post content widgets
				foreach ($post_content AS $widget):
				?>

					<div class="row event" data-name="postcontent-<?php echo $widget; ?>" data-template="<?php echo @$template; ?>">

						<div class="col-lg-12">

							<?php 
							echo view('theme::partials.widgets.'.$widget);
							?>		

						</div>

					</div>

				<?php
				endforeach;
				?>
	
			</div>				


		</div>		

		<div class="footer headroom legroom">

			<?php
			echo view('theme::partials.foot');
			?>

		</div>

	</div>		

</div>

<?php
echo view('theme::partials.footer');
?>