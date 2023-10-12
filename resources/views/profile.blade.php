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
@php
    $user = auth()->user();
@endphp
    <form method="post" action="{{route('application-biodata')}}" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <x-adminlte-input name="passport_number" label="Passport Number" placeholder="Passport Number"
                fgroup-class="col-md-4" disable-feedback value="{{old('passport_number',$user->biodata?->passport_number)}}" />


        </div>
        <div class="row">
            <x-adminlte-select name="gender" label="Gender" fgroup-class="col-md-4">
                <option value="">Select</option>
                <option value="Male" {{ optional($user->biodata)->gender == "Male" ? 'selected' : '' }}>Male</option>
                <option value="Female" {{ optional($user->biodata)->gender == "Female" ? 'selected' : '' }}>Female</option>
            </x-adminlte-select>

            <div class="col-md-4">
                <label for="">Date Of Birth</label>
                <input type="date" name="birthday" class="form-control" value="{{ old('birthday') ?? $user->biodata?->birthday }}">
            </div>
            <x-adminlte-select name="lga" label="LGA" fgroup-class="col-md-4">
                <option value="">Select LGA</option>
                @foreach ($lgas as $lga)
                    <option value="{{ $lga->name }}" {{ optional($user->biodata)->lga == $lga->name ? 'selected' : '' }}>
                        {{ $lga->name }}
                    </option>
                @endforeach
            </x-adminlte-select>



        </div>
        <div class="row">

            <x-adminlte-input name="phone" label="Phone Number" placeholder="Phone Number"
                fgroup-class="col-md-4" value="{{old('phone',$user->biodata?->phone)}}" disable-feedback/>
                <x-adminlte-input name="place_of_birth" label="Place Of Birth" placeholder="Place Of Birth"
                fgroup-class="col-md-4" value="{{old('place_of_birth',optional($user->biodata)->place_of_birth)}}" disable-feedback/>

                <div class="col-md-4">
                <label>Address</label>
                <textarea id="mytextarea" name="address"   class="form-control" placeholder="address" rows="3">
                    {{ old('address', $user->biodata?->address) }}
                    </textarea>
                </div>
        </div>
        <div class="row">

            <x-adminlte-input name="town" label="Town/Village/ward" placeholder="Town/Village/ward"
            fgroup-class="col-md-4" value="{{old('town',optional($user->biodata)->town)}}" disable-feedback/>
            <x-adminlte-input name="occupation" label="Occupation" placeholder="Occupation"
            fgroup-class="col-md-4" value="{{old('occupation',optional($user->biodata)->occupation)}}" disable-feedback/>
            <x-adminlte-input name="height" label="Height in cm" placeholder="Height in cm"
            fgroup-class="col-md-4" value="{{old('height',optional($user->biodata)->height)}}" disable-feedback/>

        </div>
        <div class="row">

            <x-adminlte-input name="next_of_kin" label="Next of Kin" placeholder="Next of Kin"
            fgroup-class="col-md-4" value="{{old('next_of_kin',optional($user->biodata)->next_of_kin)}}" disable-feedback/>
            <x-adminlte-select name="marital_status" label="Marital Status" fgroup-class="col-md-4">
                <option value="">Select</option>
                <option value="Single" {{ old('marital_status', optional($user->biodata)->marital_status) == "Single" ? 'selected' : '' }}>Single</option>
                <option value="Married" {{ old('marital_status', optional($user->biodata)->marital_status) == "Married" ? 'selected' : '' }}>Married</option>
            </x-adminlte-select>

            <x-adminlte-input name="next_of_kin_phone" label="Next of Kin Phone" placeholder="Next of Kin Phone"
            fgroup-class="col-md-4" value="{{old('next_of_kin_phone',$user->biodata?->next_of_kin_phone)}}" disable-feedback/>

        </div>
        <div class="row">
            <x-adminlte-input-file name="passport" label="Upload Passport" accept="image/*" placeholder="Choose a file..."
            id="formFile" onChange="mainThumbnailUrl(this)" fgroup-class="col-md-4"
            disable-feedback/>


        </div>
        <div class="row">

            <img src="{{asset($user->biodata?->passport) }}" style="width:100px;height:100px;" id="passport">

        </div>
        <div class="row">
            <x-adminlte-button class="btn-flat" type="submit" label="Submit" theme="success" icon="fas fa-lg fa-save"/>
        </div>



    </form>
</x-adminlte-card>



@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
    <script type="text/javascript">


        $(document).ready(function(){
         $('#passport').on('change', function(){ //on file input change
            if (window.File && window.FileReader && window.FileList && window.Blob) //check File API supported browser
            {
                var data = $(this)[0].files; //this file data

                $.each(data, function(index, file){ //loop though each file
                    if(/(\.|\/)(gif|jpe?g|png|webp)$/i.test(file.type)){ //check supported file type
                        var fRead = new FileReader(); //new filereader
                        fRead.onload = (function(file){ //trigger function on successful read
                        return function(e) {
                            var img = $('<img/>').addClass('passport').attr('src', e.target.result) .width(100)
                        .height(80); //create image element
                            $('#image_preview').append(img); //append image to output element
                        };
                        })(file);
                        fRead.readAsDataURL(file); //URL representing the file's data.
                    }
                });

            }else{
                alert("Your browser doesn't support File API!"); //if File API is absent
            }
         });
        });

       function mainThumbnailUrl(input) {
           if(input.files && input.files[0]){
               let reader = new FileReader();
               reader.onload = function(e){
               $('#passport').attr('src',e.target.result).width(80).height(80);
               };
               reader.readAsDataURL(input.files[0]);

           }
       }



       </script>

@stop
