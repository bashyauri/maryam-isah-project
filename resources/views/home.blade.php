@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Kebbi State Hajj Applications Dashboard</h1>
@stop

@section('content')
    <p>Congratulations for your Interest in Hajj.</p>


    <h3>Assalamu Alaikum {{auth()->user()->name}}</h3>

{{-- Themes --}}





@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
