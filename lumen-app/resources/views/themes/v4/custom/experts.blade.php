@extends('theme::layouts.two_column')

{!! Assets::queue('stylesheet', 'layout', 'experts', '/assets/css/custom/experts.css') !!}

@section('content')

	<section class="experts">

		<h1>STACK Experts</h1>

		<div class="col-xs-12 divider footroom">

			<div class="col-xs-12 col-sm-4">
				@include('theme::partials.img',
					array(
						'src' 	=> '/assets/img/become-stack-expert.png', 
						'alt' 	=> 'Become a STACK Expert',
						'class'	=> 'img-responsive'
					)
				)
			</div>
			<div class="col-xs-12 col-sm-8">
				<p>The best sports performance experts in the country—trainers, nutritionists, sport psychologists and others—contribute STACK's Sports Performance content. These men and women work with top athletes and teams, at both the collegiate and professional level, to help them get better and make smart training, nutrition, skills and gear choices. They regularly offer the benefits of their experience to help STACK's readers and web visitors become better athletes. Read about their backgrounds and find their articles and posts—all designed to help young athletes safely and effectively boost their performance. 
				<a href="{!! routelink('page',array('slug' => 'stack-expert-contributor-program')) !!}">Learn More.</a></p>
			</div>

		</div>

		@foreach ($experts AS $key => $value)

			@if (isset($value->meta['userphoto_image_file']))

				<div class="col-xs-12 expert-list headroom">
					<div class="col-xs-12 col-sm-3">
						@include('theme::partials.img',
							array(
								'src' 	=> 'http://blog.stack.com/wp-content/uploads/userphoto/'.$value->meta['userphoto_image_file'], 
								'alt' 	=> $value->display_name,
								'class'	=> 'img-responsive'
							)
						)
					</div>
					<div class="col-xs-12 col-sm-9">
						<p>{!! $value->meta['description'] !!}</p>
						<p><a href="{!! routelink('author',array('slug' => $value->user_nicename)) !!}">Read More About {!! $value->meta['nickname'] !!}</a></p>
					</div>
				</div>

			@endif

		@endforeach

	</section>


@stop