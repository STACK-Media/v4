{!! Assets::queue_raw('stylesheet', 'global', 'kaepcss', '/assets/css/promotions/kaep-popup.css') !!}
{!! Assets::queue_raw('javascript', 'global', 'kaepjs', '/assets/js/promotions/kaep-popup.js') !!}
@extends('global.partials.promotions.popup_layout', array('modal_class' => 'kaepopup', 'poptype' => 'intro'))

@section('modal-header')

@stop

@section('modal-body')

<form id="kaepernick" method="post" action="">

	<div id="kaepclose" class="close" data-dismiss="modal">&times;</div>

	<div class="row">

		<div id="kaepinner" class="col-md-7 pull-right">

			<input type="hidden" value="1" name="lists[Newsletter]">
			<input type="hidden" value="1" name="lists[RobotNewsletter]">
			<input type="hidden" value="newsletter_popup_mobile" name="vars[source]">
			<input type="hidden" value="" name="vars[keywords]">

			<p>Become a Better Athlete.</p>
			<p>Sign Up for our FREE Newsletter.</p>

			<input type="text" placeholder="Your Email" name="email" class="form-control" id="kaepemail">

			<button type="submit" class="btn btn-danger btn-block">
				Sign Up
			</button>

		</div>

	</div>

</form>


@stop


@section('modal-footer')

@stop