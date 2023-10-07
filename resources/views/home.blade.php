@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Kebbi State Hajj Applications Dashboard</h1>
@stop

@section('content')
    <p>Congratulations for your Interest in Hajj.</p>




{{-- Themes --}}

<x-adminlte-card title="Lightblue Card" theme="lightblue" theme-mode="outline"
    icon="fas fa-lg fa-envelope" header-class="text-uppercase rounded-bottom border-info">
    A removable card with outline lightblue theme...
</x-adminlte-card>



@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
