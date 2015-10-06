@extends('theme::layouts.two_column')

@section('content')

<div>
	
	<h1>
		{!! $page->title !!}
	</h1>

	<div>
		{!! $page->content !!}
	</div>

	<div>
		<a href="{!! routelink('article', array('slug' => $page->article_slug)) !!}">Back to Main Article</a>
	</div>

	@if(is_array($page->related) && count($page->related) > 1)

		<h2>Related Exercises</h2>

		@foreach($page->related as $related)

			@if($related->id != $page->id)

				<h1>
					{!! $page->title !!}
				</h1>

				<div>
					{!! $page->content !!}
				</div>

				<div>
					<a href="{!! routelink('article', array('slug' => $page->article_slug)) !!}">Back to Main Article</a>
				</div>

			@endif

		@endforeach

	@endif

	

	{!! var_export($page->related, TRUE) !!}

</div>

@stop