<?php

/*
print "<pre>";
print_r($author);
print_r($meta);
print_r($articles);
exit;
*/


// set URL ot author image
$author_image 	= 'http://blog.stack.com/wp-content/uploads/userphoto/'.$meta['userphoto_image_file']['value'];

?>
{!! Assets::queue('stylesheet',  'widgets', 'featured-expert', '/assets/css/widgets/featured-expert.css') !!}

<div class="row featured-expert">

	<div class="col-xs-12 featured-expert-profile-">

		<h3>Featured Expert</h3>

		<div class="col-xs-3">
			@include('theme::partials.img',
				array(
					'src' 	=> $author_image, 
					'alt' 	=> $author['display_name'],
					'class'	=> 'img-responsive'
				)
			)
		</div>

		<div class="col-xs-9">

			<h2>{{$author['display_name']}}</h2>
			<p>{{$meta['description']['value']}}</p>

		</div>

	</div>

	<div class="col-xs-12 featured-expert-articles-">

		<h3>Latest Articles By {{$author['display_name']}}</h3>

		@foreach($articles as $key => $value)

			<?php
			if ($key > 2)
				break;
			?>

			<div class="col-xs-4">

				<a href="{!! routelink('article', array('slug' => $value['post_name'])) !!}">
					@include('theme::partials.img',
						array(
							'src' 	=> 'http://blog.stack.com/wp-content/uploads/2015/07/Shuffle-STACK1-300x168.png', 
							'alt' 	=> 'Shuffle STACK',
							'class'	=> 'img-responsive'
						)
					)
					{{$value['post_title']}}
				</a>
			</div>

		@endforeach

	</div>

</div>
