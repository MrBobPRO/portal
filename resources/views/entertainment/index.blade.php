@extends('templates.master')
@section('content')

@include('templates.breadcrumbs')

   <section class="entertainment-page">

      {{-- Dropdown links start --}}
      <div class="dropdown navbar-dropdown">
         <a class="btn btn-secondary dropdown-toggle" href="{{route('entertainment.index')}}" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
           {{__('Развлечения')}}
         </a>
       
         <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
            <li><a class="dropdown-item" href="{{route('home.index')}}">{{__('Главная')}}</a></li>
            <li><a class="dropdown-item" href="{{route('structure.index')}}">{{__('Структура')}}</a></li>
            <li><a class="dropdown-item" href="{{route('knowledge.index')}}">{{__('Центр знаний')}}</a></li>
            <li><a class="dropdown-item" href="{{route('news.index')}}">{{__('Новости')}}</a></li>
            <li><a class="dropdown-item" href="{{route('projects.index')}}">{{__('Проекты и инициативы')}}</a></li>
         </ul>
      </div>{{-- Dropdown links start --}}

      {{-- Categories start --}}
      <div class="wrapper">
         <a href="{{ route('entertainment.videos.index') }}">
            <img src="{{ asset('img/entertainment/videos.jpg') }}">
            <p>{{ __('Видео') }}</p>
         </a> 

         <a href="{{ route('entertainment.gallery.index') }}">
            <img src="{{ asset('img/entertainment/gallery.jpg') }}">
            <p>{{ __('Галерея') }}</p>
         </a> 
      </div>
      {{-- Categories end --}}
   </section>
   
@endsection
