
@extends('theme::layouts.two_column')

@section('content')
	
	<script>
	(function() {
		var cx = '011202484228800486923:ua14linrb4k';
		var gcse = document.createElement('script');
		gcse.type = 'text/javascript';
		gcse.async = true;
		gcse.src = (document.location.protocol == 'https:' ? 'https:' : 'http:') +
		    '//www.google.com/cse/cse.js?cx=' + cx;
		var s = document.getElementsByTagName('script')[0];
		s.parentNode.insertBefore(gcse, s);
	})();
	</script>
	<gcse:search queryParameterName="stext" linktarget="_parent" enableAutoComplete="true"></gcse:search>

@stop