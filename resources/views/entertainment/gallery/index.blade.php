@extends('templates.master')
@section('content')

@include('templates.breadcrumbs')

   <section class="entertainment-gallery-page">

      <div class="projects-list">
         @foreach ($galleries as $gallery)
            <a href="{{ route('entertainment.gallery.show', $gallery->id) }}">
               <img src="{{ asset('img/entertainment/gallery/' . $gallery->image) }}">

               <div>
                  <p>{{$gallery->name}}</p>
                  <span>
                     <?php 
                        $date = \Carbon\Carbon::parse($gallery->date)->locale('ru');
                        $formatted = $date->isoFormat('DD MMMM YYYY');
                     ?>
                     {{$formatted}}
                  </span>
               </div>
            </a>
         @endforeach
      </div>

      {{ $galleries->links() }}

   </section>
   
@endsection
