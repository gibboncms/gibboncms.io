@extends('layouts.master')

@section('title', $page->title)

@section('content')
    <section class="page">
        {!! markdown($page->body) !!}
    </section>
@stop
