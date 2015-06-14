@extends('layouts.master')

@section('title', 'GibbonCms')

@section('content')
    {!! markdown(liana('blocks')->get('intro')->body) !!}
@stop
