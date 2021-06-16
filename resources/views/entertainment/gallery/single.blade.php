@extends('templates.master')
@section('content')

@include('templates.breadcrumbs')

   <section class="entertainment-gallery-page">

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

      <div class="gallery">
         
         @foreach ($gallery->images as $image)

            <a class="elem" 
               href="{{ asset('img/entertainment/images/' . $image->filename) }}" 
               data-lcl-thumb="{{ asset('img/entertainment/images/' . $image->filename) }}">
               <span style="background-image: url({{ asset('img/entertainment/images/' . $image->filename) }});"></span>
            </a>             
         
         @endforeach

      </div>

   </section>
   
@endsection
