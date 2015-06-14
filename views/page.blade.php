@extends('layouts.'.(app('request')->segment(1) === 'docs' ? 'docs' : 'master'))

@section('title', $page->title)

@section('content')
    <section class="page">
        {!! markdown($page->body) !!}
    </section>
@stop
