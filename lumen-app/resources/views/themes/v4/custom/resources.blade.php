@extends('theme::layouts.two_column')

{!! Assets::queue('stylesheet', 'layout', 'resources', '/assets/css/custom/resources.css') !!}

@section('content')

    <section class="resources">

        <div class="row">

            <div class="col-xs-12 divider">
                <h1>STACK Resources</h1>
            </div>

            @foreach ($resources AS $key => $value)

                <a href="{!! $value['url'] !!}">
                    <div class="col-xs-12">
            
                        <div class="col-xs-4">

                            @include('theme::partials.img',
                                array(
                                    'src'   => $value['img'], 
                                    'alt'   => $value['title'],
                                    'class' => 'img-responsive max-250'
                                )
                            )

                        </div>

                        <div class="col-xs-8 text">

                            <h2>{!! $value['title'] !!}</h2>
                            <p>{!! $value['description'] !!}</p>

                        </div>

                    </div>
                </a>

            @endforeach

        </div>

    </section>

@stop