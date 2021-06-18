@extends('templates.master')
@section('content')
   
@include('templates.breadcrumbs')

   <section class="news-page">

      {{-- Latest news start --}}
      <div class="latest-news">

         <?php $appLocale = \App::currentLocale(); ?>

         @foreach ($news as $new)
            <div class="single-news">
               <img src="{{ asset('img/news/'. $new->image) }}">
               <a href="{{route('news.single', $new->id)}}">

                  <?php
                     // Generate News title from appLocale
                     $newsTitle = $new[$appLocale . 'Title'];

                     //Generate News Date Locale from appLocale
                     if($appLocale == 'en') 
                        $newsDateLocale = 'en';
                     else
                        $newsDateLocale = 'ru';

                     // Generate News text from appLocale
                     $newsText = $new[$appLocale . 'Text'];
                     //Replace all tags by space
                     $newsText = preg_replace('#<[^>]+>#', ' ', $newsText);
                  ?>

                  <h3>{{ $newsTitle }}</h3>
                  <p>{!! $newsText !!}</p> 
                  <div class="news-desc">
                     <span class="news-date">
                        <?php 
                           $date = \Carbon\Carbon::parse($new->created_at)->locale($newsDateLocale);
                           $formatted = $date->isoFormat('DD MMMM YYYY');
                        ?>
                        {{$formatted}}
                     </span>
                     <span class="news-view">{{__('Подробнее')}}</span>
                  </div>
                  

               </a>
            </div>
         @endforeach

         {{$news->links()}}
      </div>
      {{-- Latest news end --}}

   </section>

@endsection