@extends('templates.master')
@section('content')

@include('templates.breadcrumbs')

   <section class="videos-single-page">

      {{-- Dropdown links start --}}
      <div class="dropdown navbar-dropdown">
         <a class="btn btn-secondary dropdown-toggle" href="{{route('knowledge.index')}}" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
         {{__('Центр знаний')}}
         </a>
      
         <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
            <li><a class="dropdown-item" href="{{route('home.index')}}">{{__('Главная')}}</a></li>
            <li><a class="dropdown-item" href="{{route('structure.index')}}">{{__('Структура')}}</a></li>
            <li><a class="dropdown-item" href="{{route('news.index')}}">{{__('Новости')}}</a></li>
            <li><a class="dropdown-item" href="{{route('projects.index')}}">{{__('Проекты и инициативы')}}</a></li>
            <li><a class="dropdown-item" href="{{route('entertainment.index')}}">{{__('Развлечения')}}</a></li>
         </ul>
      </div>{{-- Dropdown links start --}}

      <div class="single-video">
         {{-- Custom id used in js --}}
         <video class="plyr" playsinline controls id="player0"
            data-poster="/videos/knowledge/posters/{{$video->poster}}">
            @if ($video->from_catalog)
               <source src="/catalog/videos//{{$video->filename}}"/>
            @else
               <source src="/videos/knowledge/{{$video->filename}}"/>
            @endif
            @if($video->subtitles != '')
               <track kind="captions" label="English" src="/videos/knowledge/subtitles/{{$video->subtitles}}" srclang="en" default />
            @endif
         </video>
         
      </div>

   </section>
   
@endsection
