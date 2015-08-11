{!! Assets::queue('stylesheet',  'widgets', 'pinterest-block', '/assets/css/widgets/pinterest-block.css') !!}

<section data-name="pinterest-block" class="pinterest-block ">

	<div class="col-xs-12">
		
		<h3>More Cool Stuff You'll Like</h3>

	    <div class="pinterest-container">

			@foreach($pinterest as $key => $value)

			    <div class="pinterest-item"> 

					<a href="{!! routelink('article', array('slug' => $value['slug'])) !!}">

						<div class="pinterest-img-holder">
							@include('theme::partials.img',
								array(
									'src' 	=> $value['image'], 
									'alt' 	=> $value['name'],
									'class'	=> 'img-responsive'
								)
							)
							<span class="pinterest-title-block">
								<h2 class="pinterest-title">{{$value['name']}}</h2>
							</span>
						</div>

					</a>

			    </div>

		    @endforeach

	    </div>

	</div>

</section>

