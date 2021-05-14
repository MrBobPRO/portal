@extends('templates.master')
@section('content')
   
@include('templates.breadcrumbs')

   <section class="news-page">

      {{-- Latest news start --}}
      <div class="latest-news">
         @foreach ($news as $new)
            <div class="single-news">
               <img src="{{ asset('img/news/'. $new->image) }}">
               <a href="{{route('news.single', $new->id)}}">

                  @switch(\App::currentLocale())
                     @case('ru')
                        <h3>{{ $new->ruTitle }}</h3>
                        <p>{!! $new->ruText !!}</p> 
                        <span class="news-date">
                           <?php 
                              $date = \Carbon\Carbon::parse($new->created_at)->locale('ru');
                              $formatted = $date->isoFormat('DD MMMM YYYY');
                           ?>
                           {{$formatted}}
                        </span>
                     @break
                     
                     @case('tj')
                        <h3>{{ $new->tjTitle }}</h3>
                        <p>{!! $new->tjText !!}</p> 
                        <span class="news-date">
                           <?php 
                              $date = \Carbon\Carbon::parse($new->created_at)->locale('ru');
                              $formatted = $date->isoFormat('DD.MM.YYYY');
                           ?>
                           {{$formatted}}
                        </span>
                     @break

                     @case('en')
                        <h3>{{ $new->enTitle }}</h3>
                        <p>{!! $new->enText !!}</p> 
                        <span class="news-date">
                           <?php 
                              $date = \Carbon\Carbon::parse($new->created_at)->locale('en');
                              $formatted = $date->isoFormat('DD MMMM YYYY');
                           ?>
                           {{$formatted}}
                        </span>
                     @break
                  @endswitch

               </a>
            </div>
         @endforeach

         {{$news->links()}}
      </div>
      {{-- Latest news end --}}

   </section>

@endsection