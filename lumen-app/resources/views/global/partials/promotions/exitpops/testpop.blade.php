@extends('global.partials.promotions.popup_layout', array('modal_class' => 'testpop', 'poptype' => 'exit', 'popbgclose' => FALSE))

@section('modal-header')

@stop

@section('modal-body')

	TESTING <button type="button" data-toggle="modal" data-target="#exitpop">close me</button>

@stop


@section('modal-footer')

@stop