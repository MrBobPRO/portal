@extends('templates.master')
@section('content')

@include('templates.breadcrumbs')

   <section class="entertainment-page">

      {{-- Categories start --}}
      <div class="wrapper">
         <a href="{{ route('entertainment.videos.index') }}">
            <img src="{{ asset('img/entertainment/videos.jpg') }}">
            <p>{{ __('Видео') }}</p>
         </a> 

         <a href="{{ route('entertainment.gallery.index') }}">
            <img src="{{ asset('img/entertainment/gallery.jpg') }}">
            <p>{{ __('Галерея') }}</p>
         </a> 
      </div>
      {{-- Categories end --}}
   </section>
   
@endsection
