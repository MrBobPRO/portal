@extends('templates.master')
@section('content')

@include('templates.breadcrumbs')

   <section class="entertainment-gallery-page">

      <div class="galleries-list">
         @foreach ($galleries as $gallery)
            <a href="{{ route('entertainment.gallery.single', $gallery->id) }}">
               <img src="{{ asset('img/entertainment/galleries/' . $gallery->image) }}">

               <div>

                  @switch(\App::currentLocale())
                     @case('ru')
                        <p>{{$gallery->ruTitle}}</p>
                        <span>
                           <?php 
                              $date = \Carbon\Carbon::parse($gallery->date)->locale('ru');
                              $formatted = $date->isoFormat('DD MMMM YYYY');
                           ?>
                           {{$formatted}}
                        </span>
                     @break

                     @case('tj')
                        <p>{{$gallery->tjTitle}}</p>
                        <span>
                           <?php 
                              $date = \Carbon\Carbon::parse($gallery->date)->locale('ru');
                              $formatted = $date->isoFormat('DD.MM.YYYY');
                           ?>
                           {{$formatted}}
                        </span>
                     @break

                     @case('en')
                        <p>{{$gallery->enTitle}}</p>
                        <span>
                           <?php 
                              $date = \Carbon\Carbon::parse($gallery->date)->locale('en');
                              $formatted = $date->isoFormat('DD MMMM YYYY');
                           ?>
                           {{$formatted}}
                        </span>
                     @break
                  @endswitch   

               </div>
            </a>
         @endforeach
      </div>

      {{ $galleries->links() }}

   </section>
   
@endsection
