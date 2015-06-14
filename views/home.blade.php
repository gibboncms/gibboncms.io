@extends('layouts.master')

@section('title', 'GibbonCms')

@section('content')
    {!! markdown(liana('blocks')->get('intro')->body) !!}

    <a href="{{ app('navigation')->docs()['intro'][0]['url'] }}">Docs</a> 
@stop
