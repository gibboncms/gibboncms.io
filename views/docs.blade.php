@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-tn-6 col-md-4">
                @include('layouts._partials.navigation')
            </div>
            <div class="col-tn-18 col-md-20">
                <section class="docs">
                    {!! markdown($page->body) !!}
                </section>
            </div>
        </div>
    </div>
@stop
