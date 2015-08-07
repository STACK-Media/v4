{!! Assets::queue('stylesheet',  'widgets', 'related-links', '/assets/css/widgets/related-links.css') !!}

<section data-name="related-links-widget">

	<div class="row footroom related-links">

		<?php
		if (isset($links['category']) AND is_array($links['category']) AND ! empty($links['category'])):
		?>

		<div class="col-xs-12 col-sm-4">

			<h3>More About {{$links['category']['name']}}</h3>

			<ul>

				<?php
				foreach ($links['category']['articles'] AS $article):
				?>

					<li><a href="{!! routelink('article', array('slug' => $article['slug'])) !!}">{{$article['name']}}</a></li>
			
				<?php
				endforeach;
				?>

			</ul>

		</div>

		<?php
		endif;


		if (isset($links['tag']) AND is_array($links['tag']) AND ! empty($links['tag'])):
		?>
		
		<div class="col-xs-12 col-sm-4">

			<h3>More About {{$links['tag']['name']}}</h3>

			<ul>

				<?php
				foreach ($links['tag']['articles'] AS $article):
				?>

					<li><a href="{!! routelink('article', array('slug' => $article['slug'])) !!}">{{$article['name']}}</a></li>
			
				<?php
				endforeach;
				?>

			</ul>

		</div>

		<?php
		endif;



		if (isset($links['video']) AND is_array($links['video']) AND ! empty($links['video'])):
		?>
		
		<div class="col-xs-12 col-sm-4">

			<h3>Other Great Videos</h3>

			<ul>

				<?php
				foreach ($links['video'] AS $video):
				?>

					<li><a href="{!! routelink('video', array('id' => $video['id'], 'slug' => $video['slug'])) !!}">{{$video['name']}}</a></li>
			
				<?php
				endforeach;
				?>

			</ul>

		</div>

		<?php
		endif;
		?>

	</div>


</section>