@extends('adminlte::page')

@section('title', 'Complain Area')

@section('content_header')
    <h1>Kebbi State Hajj Application</h1>
@stop

@section('content')




{{-- Themes --}}

<x-adminlte-card title="Complain Area" theme="lightblue" theme-mode="outline"
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
    <form method="post" action="{{route('application.store.complain')}}" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-md-4">
                <label>Address</label>
                <textarea id="mytextarea" name="complain"   class="form-control" placeholder="address" rows="3">
                    {{ old('complain') }}
                    </textarea>
                </div>
            </div>
        <div class="row">
            <x-adminlte-input-file name="complain_file" label="Provide Image(Optional)" accept="image/*" placeholder="Choose a file..."
            id="formFile" onChange="mainThumbnailUrl(this)" fgroup-class="col-md-4"
            disable-feedback/>


        </div>

        <div class="row">

            <img src="" style="width:100px;height:100px;" id="complain_file">

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
         $('#complain_file').on('change', function(){ //on file input change
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
               $('#complain_file').attr('src',e.target.result).width(80).height(80);
               };
               reader.readAsDataURL(input.files[0]);

           }
       }



       </script>

@stop
