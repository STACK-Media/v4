{!! Assets::queue_raw('javascript', 'global', 'popup', '/assets/js/promotions/popup.js') !!}

<div class="modal fade {!! (isset($modal_class) ? $modal_class : '') !!}" id="intropop">
	<div class="modal-dialog">
		<div class="modal-content">

			<div class="modal-header">

				@yield('modal-header')

			</div>

			<div class="modal-body">

				@yield('modal-body')				

			</div>

			<div class="modal-footer">

				@yield('modal-footer')

			</div>

		</div>
	</div>
</div>