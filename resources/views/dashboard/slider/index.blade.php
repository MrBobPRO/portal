@extends('dashboard.templates.no_sidebar_master')

@section('content')

   <section class="slider-page">
      
      <a class="add-button" href="{{route('dashboard.slider.create')}}"><span class="material-icons-outlined">add</span></a>
      
      <div class="primary-list-titles">
         <div class="width-33">{{__('Приоритет')}}</div>
         <div class="width-33">{{__('Текст')}}</div>
         <div class="width-33">{{__('Ссылка')}}</div>
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