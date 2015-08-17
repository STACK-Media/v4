
@if(isset($menu_data['data']['articles']))

	<div class="row">

		@foreach($menu_data['data']['articles'] as $article)
			
			<div class="col-sm-4">
				<a href="{!! routelink('article', array('slug' => $article->slug)) !!}">
					<img src="{!! $article->image !!}"/> <br/>
					{!! $article->name !!}
				</a>
			</div>

		@endforeach

	</div>

@endif