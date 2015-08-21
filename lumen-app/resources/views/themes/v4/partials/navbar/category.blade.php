
@if(isset($menu_data['data']['articles']))

	<div class="row">

		@foreach($menu_data['data']['articles'] as $article)
			
			<div class="col-sm-4">
				<a class="nav-post" href="{!! routelink('article', array('slug' => $article->slug)) !!}">
					<img src="{!! $article->image !!}" class="img-responsive"/>
					<span>{!! $article->name !!}</span>
				</a>
			</div>

		@endforeach

	</div>

@endif	