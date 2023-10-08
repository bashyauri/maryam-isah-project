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
    <form method="post" action="{{route('application-biodata')}}">
        @csrf
        <div class="row">
            <x-adminlte-input name="passport_number" label="Passport Number" placeholder="Passport Number"
                fgroup-class="col-md-4" disable-feedback/>
                <x-adminlte-input name="first_name" label="Firstname" placeholder="First Name"
                fgroup-class="col-md-4" disable-feedback/>
                <x-adminlte-input name="other_names" label="Other Names" placeholder="Other Names"
                fgroup-class="col-md-4" disable-feedback/>

        </div>
        <div class="row">
            <x-adminlte-select name="gender" label="Gender"
            fgroup-class="col-md-4">
                <x-adminlte-options :options="['Male', 'Female']" disabled="1"
                    empty-option="Select an option..." />
            </x-adminlte-select>
            <x-adminlte-input name="birthday" label="Date of Birth" placeholder="Date of Birth"
                fgroup-class="col-md-4" disable-feedback/>
                <x-adminlte-input name="lga" label="LGA" placeholder="Local Government Area"
                fgroup-class="col-md-4" disable-feedback/>
        </div>
        <div class="row">

            <x-adminlte-input name="phone" label="Phone Number" placeholder="Phone Number"
                fgroup-class="col-md-4" disable-feedback/>
                <x-adminlte-input name="place_of_birth" label="Place Of Birth" placeholder="Place Of Birth"
                fgroup-class="col-md-4" disable-feedback/>
                <x-adminlte-textarea name="address" label="Address" placeholder="Insert description..."  fgroup-class="col-md-4" disable-feedback/>

        </div>
        <div class="row">

            <x-adminlte-input name="town" label="Town/Village/ward" placeholder="Town/Village/ward"
            fgroup-class="col-md-4" disable-feedback/>
            <x-adminlte-input name="occupation" label="Occupation" placeholder="Occupation"
            fgroup-class="col-md-4" disable-feedback/>
            <x-adminlte-input name="height" label="Height in cm" placeholder="Height in cm"
            fgroup-class="col-md-4" disable-feedback/>

        </div>
        <div class="row">

            <x-adminlte-input name="next_of_kin" label="Next of Kin" placeholder="Next of Kin"
            fgroup-class="col-md-4" disable-feedback/>
            <x-adminlte-select name="marital_status" label="Marital Status"
            fgroup-class="col-md-4">
                <x-adminlte-options :options="['Single', 'Married']" disabled="1"
                    empty-option="Select an option..." />
            </x-adminlte-select>
            <x-adminlte-input name="next_of_kin_phone" label="Next of Kin Phone" placeholder="Next of Kin Phone"
            fgroup-class="col-md-4" disable-feedback/>

        </div>
        <div class="row">
            <x-adminlte-input-file name="passport" label="Upload Passport" accept="image/*" placeholder="Choose a file..."
            disable-feedback/>
        </div>
        <x-adminlte-button class="btn-flat" type="submit" label="Submit" theme="success" icon="fas fa-lg fa-save"/>

    </form>
</x-adminlte-card>



@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
