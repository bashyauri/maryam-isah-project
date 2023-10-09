@extends('adminlte::page')

@section('title', 'Medical History')

@section('content_header')
    <h1>Kebbi State Hajj Application</h1>
@stop

@section('content')




{{-- Themes --}}

<x-adminlte-card title="Medical History" theme="lightblue" theme-mode="outline"
    icon="fas fa-lg fa-bed" header-class="text-uppercase rounded-bottom border-info"
    >
    @include('flash-messages')
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    <form method="post" action="{{route('application.medical')}}" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <x-adminlte-input-file name="medical_file" label="Upload Medical File" accept="image/*" placeholder="Choose a file..."
            value="{{old('medical_file')}}" fgroup-class="col-md-4"
            disable-feedback/>

        </div>

        <x-adminlte-button class="btn-flat" type="submit" label="Upload" theme="success" icon="fas fa-lg fa-save"/>

    </form>
</x-adminlte-card>



@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
