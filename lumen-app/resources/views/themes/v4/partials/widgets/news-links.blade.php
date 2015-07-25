{!! Assets::queue('stylesheet',  'widgets', 'news-links', '/assets/css/widgets/news-links.css') !!}

<div class="row">

	<div class="col-xs-12">

		<h3>Latest In News</h3>

		<div id="news-links">

			<ul>

				@foreach($news['articles'] as $key => $value)

					<li>
						<a href="{{$value['url']}}"> <?php //  alt="{{$value['title']}}" ?>
							{{$value['title']}}
						</a>
					</li>

				@endforeach

			</ul>

		</div>

	</div>

</div>