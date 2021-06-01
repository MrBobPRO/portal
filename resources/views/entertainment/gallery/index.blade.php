@extends('templates.master')
@section('content')

@include('templates.breadcrumbs')

   <section class="entertainment-gallery-page">

      <div class="galleries-list">
         @foreach ($galleries as $gallery)
            <a href="{{ route('entertainment.gallery.single', $gallery->id) }}">
               <img src="{{ asset('img/entertainment/galleries/' . $gallery->image) }}">

               <?php 
                  $appLocale = \App::currentLocale(); 
                  //genereate translation column names
                  $n_title = $appLocale . 'Title';
                  //Generate News Date Locale from appLocale
                  if($appLocale == 'en') $n_date_locale = 'en';
                  else $n_date_locale = 'ru';
               ?>

               <div>
                  <p>{{$gallery[$n_title]}}</p>
                  <span>
                     <?php 
                        $date = \Carbon\Carbon::parse($gallery->date)->locale($n_date_locale);
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
