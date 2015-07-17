
{!! Assets::queue('javascript', 'global', 'jquery', '//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js') !!}
{!! Assets::queue('javascript', 'global', 'bootstrap', '/assets/third-party/initializr/js/vendor/bootstrap.min.js') !!}

{!! Assets::queue('javascript', 'global', 'viewport', '/assets/js/viewport.js') !!}
{!! Assets::queue('javascript', 'global', 'events', '/assets/js/events.js') !!}

{!! //Assets::get_queued('javascript') !!}

</body>
</html>