@extends('templates.master')
@section('content')

@include('templates.breadcrumbs')

   <section class="entertainment-gallery-page">

      <div class="galleries-list">
         @foreach ($galleries as $gallery)
            <a href="{{ route('entertainment.gallery.single', $gallery->id) }}">
               <img src="{{ asset('img/entertainment/galleries/' . $gallery->image) }}">

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
