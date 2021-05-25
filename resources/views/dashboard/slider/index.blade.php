@extends('dashboard.templates.no_sidebar_master')

@section('content')

   <section class="slider-page">
      
      {{-- Search is unavailable in sliders page --}}
      <div class="dash-search-container">
         <a href="{{route('dashboard.news.create')}}">Добавить</a>
      </div>

      
      <div class="primary-list-titles">
         <div class="width-33">Порядок показа</div>
         <div class="width-33">Текст</div>
         <div class="width-33">Ссылка</div>
      </div>

      <div class="primary-list">
         @foreach($items as $item)
            <a class="primary-list-item" href="{{ route('dashboard.slider.single', $item->id)}}">
               <div class="width-33">{{$item->priority}}</div>
               <div class="width-33">{{$item->title}}</div>
               <div class="width-33">{{$item->url}}</div>
            </a>
         @endforeach
      </div>

   </section>

@endsection