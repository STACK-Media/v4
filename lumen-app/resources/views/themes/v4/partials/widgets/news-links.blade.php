{!! Assets::queue('stylesheet',  'widgets', 'news-links', '/assets/css/widgets/news-links.css') !!}

<div class="row">

	<div class="col-xs-12">

		<h3>Latest In News</h3>

		<div id="news-links">

			<ul>

				@foreach($news as $key => $value)

					<li>
						<a href="{!! routelink('article', array('slug' => $value['post_name'])) !!}"> <?php //  alt="{{$value['title']}}" ?>
							{{$value['post_title']}}
						</a>
					</li>

				@endforeach

				<li>
					<a href="/news"> 
						All News
					</a>
				</li>

			</ul>

		</div>

	</div>

</div>