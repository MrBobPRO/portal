@extends('templates.master')
@section('content')
   
@include('templates.breadcrumbs')

   <section class="news-page">
      {{-- Categories start --}}
      <div class="wrapper">
         <a href="{{ route('news.inner') }}">
            <img src="{{ asset('img/news_page/inner.jpg') }}">
            <p>{{ __('Новости компании') }}</p>
         </a> 

         <a href="{{ route('news.global') }}">
            <img src="{{ asset('img/news_page/global.jpg') }}">
            <p>{{ __('Мировые новости') }}</p>
         </a> 
      </div>
      {{-- Categories end --}}

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
                  <span class="news-date">
                     <?php 
                        $date = \Carbon\Carbon::parse($new->created_at)->locale($newsDateLocale);
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