@extends('templates.master')
@section('content')

@include('templates.breadcrumbs')

   <section class="entertainment-gallery-page">

      <div class="gallery">
         
         @foreach ($gallery->images as $image)

            <a class="elem" 
               href="{{ asset('img/entertainment/images/' . $image->filename) }}" 
               data-lcl-thumb="{{ asset('img/entertainment/images/' . $image->filename) }}">
               <span style="background-image: url({{ asset('img/entertainment/images/' . $image->filename) }});"></span>
            </a>             
         
         @endforeach

      </div>

   </section>
   
@endsection
