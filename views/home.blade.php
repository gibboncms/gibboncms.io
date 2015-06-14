@extends('layouts.master')

@section('content')
    {!! markdown(liana('blocks')->contents('home')) !!}
    
    <p>Hello world, welcome to {{ liana('settings')->get('site.name') }}</p>
@stop
