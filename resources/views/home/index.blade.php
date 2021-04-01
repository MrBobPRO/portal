@extends('templates.master')
@section('content')
   <div class="home-page">
      
      <ul class="news-list">
         @foreach ($news as $new)
            <li class="news-items clearfix">
               <img src="{{ asset('img/news/' . $new->imageUrl) }}" alt="Loading...">
               <div>
                  <h3>{{ $new->title }}</h3>
                  <p>{{ $new->text }}</p> 
                  <p class="date">
                     {{ _('Дата') }}: {{ $new->created_at }}
                  </p>
               </div>
            </li>
         @endforeach
      </ul>

      <div class="BD-card">
         @include('home.sidebar')
      </div>

   </div>
   
@endsection