@extends('layouts.master')

@section('title', $page->title)

@section('content')
    {!! markdown($page->body) !!}
@stop
