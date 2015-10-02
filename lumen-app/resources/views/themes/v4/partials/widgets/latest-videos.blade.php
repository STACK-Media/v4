{!! Assets::queue('stylesheet',  'widgets', 'latest-videos', '/assets/css/widgets/latest-videos.css') !!}

<?php
if (is_array($videos) AND count($videos) > 1):
?>

	<div class="row">

		<div class="col-xs-12 latest-videos event" data-name="0" data-template="latest-videos">

			<h3>Latest Videos <?php echo ($category) ? 'in ' . implode(' & ',$category) : ''; ?></h3>

			@foreach($videos as $key => $video)

				@if(is_array($video))

					@include('theme::partials.block',
						array(
							'key'			=> $key,
							'widget'		=> 'latest-videos',				
							'title' 		=> $video['name'], 
							'image' 		=> $video['videoStillURL'],
							'description'	=> $video['shortDescription'],
							'url'			=> $video['link'],
							'class'			=> 'block-video',
							'author'		=> ''
						)
					)

				@endif

			@endforeach

		</div>

	</div>

<?php
endif;
?>