@extends('templates.master')
@section('content')

@include('templates.breadcrumbs')

   <section class="entertainment-videos-single-page">

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
      
      <div class="single-video">
         {{-- Custom id used in js --}}
         <video class="plyr" playsinline controls id="player0"
            data-poster="/videos/entertainment/posters/{{$entertainment->poster}}">
            @if($entertainment->from_catalog)
               <source src="{{asset('catalog/videos/' . $entertainment->filename)}}">
            @else
               <source src="{{asset('videos/entertainment/' . $entertainment->filename)}}">
            @endif
         
            @if($entertainment->subtitles != '')
               <track kind="captions" label="English" src="/videos/entertainment/subtitles/{{$entertainment->subtitles}}" srclang="en" default />
            @endif
         </video>
         
      </div>

   </section>
   
@endsection
