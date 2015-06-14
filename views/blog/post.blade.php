@extends('layouts.master')

@section('title', $post->title)

@section('content')
    <h1>{{ $post->title }}</h1>
    <p>Posted on {{ $post->date->format('d-m-Y') }} by <em>{{ $post->data['author'] }}</em></p>
    {!! markdown($post->body) !!}
@stop
