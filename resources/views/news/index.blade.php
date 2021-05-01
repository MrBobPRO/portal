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
         @foreach ($news as $new)
            <div class="single-news">
               <img src="{{ asset('img/news/'. $new->image) }}">
               <a href="{{route('news.single', $new->id)}}">
                  <h3>{{$new->title}}</h3>
                  <p>{!!$new->text!!}</p>
                  <span class="news-date">
                     <?php 
                        $date = \Carbon\Carbon::parse($new->created_at)->locale('ru');
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