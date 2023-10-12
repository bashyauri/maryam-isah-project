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
            value="{{old('medical_file')}}"  id="formFile" onChange="mainThumbnailUrl(this)" fgroup-class="col-md-4"
            disable-feedback/>

        </div>
        <div class="row">

            <img src="{{asset(auth()->user()->medicalHistory?->url) }}" style="width:100px;height:100px;" id="medical_file">

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
    <script type="text/javascript">


        $(document).ready(function(){
         $('#medical_file').on('change', function(){ //on file input change
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
               $('#medical_file').attr('src',e.target.result).width(80).height(80);
               };
               reader.readAsDataURL(input.files[0]);

           }
       }



       </script>
@stop
