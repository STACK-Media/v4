{!! Assets::queue('stylesheet',  'widgets', 'sport-experts', '/assets/css/widgets/sport-experts.css') !!}

<div class="row sport-experts">

	<div class="col-xs-12">

		<h3>{{$page->name}} Experts</h3>

		@foreach($experts as $key => $value)

			<?php $class 	= ($key < 3)? '': 'hidden'; ?>

			<div class="row event {{$class}} sport-experts-row" data-name="{{$key}}" data-template="sport-experts">


				<div class="col-xs-5">

					<a href="{!! routelink('author', array('slug' => $value['slug'])) !!}">
						<div class="sport-experts-image">
							@include('theme::partials.img',
								array(
									'src' 	=> $value['image'], 
									'alt' 	=> $value['name'],
									'class'	=> 'img-responsive'
								)
							)
						</div>
					</a>
					
				</div>

				<div class="col-xs-7">

					<a class="sport-experts-link" href="{!! routelink('author', array('slug' => $value['slug'])) !!}">{{$value['name']}}</a>
					{{$value['desc']}}
					<a class="sport-experts-readmore" href="{!! routelink('author', array('slug' => $value['slug'])) !!}">Read More</a>

				</div>
				<div class="clearfix"></div>


			</div>

		@endforeach

	</div>

</div>
