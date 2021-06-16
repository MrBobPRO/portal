@extends('templates.master')
@section('content')
   
@include('templates.breadcrumbs')

   <section class="news-page">

      {{-- Dropdown links start --}}
      <div class="dropdown navbar-dropdown">
         <a class="btn btn-secondary dropdown-toggle" href="{{route('news.index')}}" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
         {{__('Новости')}}
         </a>
      
         <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
            <li><a class="dropdown-item" href="{{route('home.index')}}">{{__('Главная')}}</a></li>
            <li><a class="dropdown-item" href="{{route('structure.index')}}">{{__('Структура')}}</a></li>
            <li><a class="dropdown-item" href="{{route('knowledge.index')}}">{{__('Центр знаний')}}</a></li>
            <li><a class="dropdown-item" href="{{route('projects.index')}}">{{__('Проекты и инициативы')}}</a></li>
            <li><a class="dropdown-item" href="{{route('entertainment.index')}}">{{__('Развлечения')}}</a></li>
         </ul>
      </div>{{-- Dropdown links start --}}

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