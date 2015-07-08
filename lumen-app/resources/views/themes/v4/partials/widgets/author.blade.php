@section('widget-styles')

	<link href="http://www.author-widget-style.com/style.css" />

@append

@section('widget-queued-scripts')

	{{!! Assets::queue('javascript', 'author-widget-style', 'http://www.author-widget-style-widget-style.com/javascript.js?append-test') }}

@append


<div class="row">

	<div class="col-sm-3">

		<div class="img-author"></div>

	</div>

	<div class="col-sm-9">

		<p class="small"><a href="">Jordan Zirm</a> Jordan Zirm is an Associate Content Director for STACK. After earning his BS in Journalism from the University of Missouri, he spent time writing for...</p>
		<p><a href="#">Read more about Jordan</a></p>

	</div>

</div>

<hr />
<div class="spacer"></div>
