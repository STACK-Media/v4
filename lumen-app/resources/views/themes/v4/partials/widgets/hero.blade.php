{!! Assets::queue('stylesheet', 'widgets', 'hero', '/assets/css/widgets/hero.css') !!}

<section class="hero event" data-name="0" data-template="hero">
	<a href="{{$hero['url']}}" alt="{{$hero['title']}}">
		<img src="{{$hero['img']}}" alt="{{$hero['title']}}">
		<h2>{{$hero['title']}}</h2>
	</a>
</section>