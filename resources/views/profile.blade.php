@extends('adminlte::page')

@section('title', 'Bio Data')

@section('content_header')
    <h1>Kebbi State Hajj Application</h1>
@stop

@section('content')




{{-- Themes --}}

<x-adminlte-card title="Personal Profile" theme="lightblue" theme-mode="outline"
    icon="fas fa-lg fa-user" header-class="text-uppercase rounded-bottom border-info"
    >
    <form>
        <div class="row">
            <x-adminlte-input name="first_name" label="Firstname" placeholder="First Name"
                fgroup-class="col-md-6" disable-feedback/>
                <x-adminlte-input name="other_names" label="Other Names" placeholder="Other Names"
                fgroup-class="col-md-6" disable-feedback/>
        </div>
        <div class="row">
            <x-adminlte-input name="marital_status" label="Marital Status" placeholder="Phone Number"
                fgroup-class="col-md-4" disable-feedback/>
                <x-adminlte-input name="bvn" label="Bvn Number" placeholder="Bvn Number"
                fgroup-class="col-md-4" disable-feedback/>
                <x-adminlte-input name="passport_number" label="Passport Number" placeholder="Passport Number"
                fgroup-class="col-md-4" disable-feedback/>
        </div>
        <div class="row">
            <x-adminlte-select name="gender" label="Gender"
            fgroup-class="col-md-4">
                <x-adminlte-options :options="['Male', 'Female']" disabled="1"
                    empty-option="Select an option..." />
            </x-adminlte-select>
            <x-adminlte-select name="marital_status" label="Marital Status"
            fgroup-class="col-md-4">
                <x-adminlte-options :options="['Married', 'Single']" disabled="1"
                    empty-option="Select an option..." />
            </x-adminlte-select>
            <x-adminlte-input name="passport_number" label="Date of Birth" placeholder="Passport Number"
            fgroup-class="col-md-4" disable-feedback/>



        </div>
    </form>
</x-adminlte-card>



@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
