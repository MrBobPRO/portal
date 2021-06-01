@extends('templates.master')
@section('content')
   
@include('templates.breadcrumbs')

   <section class="news-page">

      {{-- Latest news start --}}
      <div class="latest-news">

         <?php 
            $appLocale = \App::currentLocale(); 
            //genereate translation column names
            $n_title = $appLocale . 'Title';
            $n_text = $appLocale . 'Text';
            //Generate News Date Locale from appLocale
            if($appLocale == 'en') $n_date_locale = 'en';
            else $n_date_locale = 'ru';
         ?>

         @foreach ($news as $new)
            <div class="single-news">
               <img src="{{ asset('img/news/'. $new->image) }}">
               <a href="{{route('news.single', $new->id)}}">

                  <h3>{{ $new[$n_title] }}</h3>
                  {{-- Replace all news text tags by space --}}
                  <p>{!! preg_replace('#<[^>]+>#', ' ', $new[$n_text]) !!}</p> 
                  <span class="news-date">
                     <?php 
                        $date = \Carbon\Carbon::parse($new->created_at)->locale($n_date_locale);
                        $formatted = $date->isoFormat('DD MMMM YYYY');
                     ?>
                     {{$formatted}}
                  </span>

               </a>
            </div>
         @endforeach

         {{$news->links()}}
      </div>
      {{-- Latest news end --}}

   </section>

@endsection