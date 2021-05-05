@extends('templates.master')
@section('content')

@include('templates.breadcrumbs')

   <section class="entertainment-gallery-page">

      <div class="gallery">
         
         @foreach ($images as $image)

            <a class="elem" 
               href="{{ asset('img/entertainment/gallery/' . $image->name) }}" 
               title="{{ $image->title }}" 
               data-lcl-txt="{{ $image->description }}" 
               data-lcl-author="{{ $image->author }}" 
               data-lcl-thumb="{{ asset('img/entertainment/gallery/' . $image->name) }}">
               <span style="background-image: url({{ asset('img/entertainment/gallery/' . $image->name) }});"></span>
            </a>             
         
         @endforeach

         {{ $images->links() }}

      </div>

   </section>
   
@endsection
