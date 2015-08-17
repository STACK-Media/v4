{!! Assets::queue('stylesheet',  'widgets', 'conditioning-workouts', '/assets/css/widgets/conditioning-workouts.css') !!}

<section class="landing_block">
	<div class="row">
		<div class="col-xs-12">
			<div class="workout_buttons {{$page->slug}}">
				<p>Get a Free {{$page->name}} Workout</p>
				<a href="http://{{$page->slug}}workout.stack.com" target="_blank" alt="{{$page->name}} Strength">Strength</a>
				<a href="http://conditioning.stack.com/{{$page->slug}}" target="_blank" alt="{{$page->name}} Conditioning">Conditioning</a>
			</div>
		</div>
	</div>
</section>