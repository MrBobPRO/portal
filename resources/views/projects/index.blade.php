@extends('templates.master')
@section('content')

@include('templates.breadcrumbs')

   <section class="projects-page">

      {{-- Dropdown links start --}}
      <div class="dropdown navbar-dropdown">
         <a class="btn btn-secondary dropdown-toggle" href="{{route('projects.index')}}" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
           {{__('Проекты и инициативы')}}
         </a>
       
         <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
            <li><a class="dropdown-item" href="{{route('home.index')}}">{{__('Главная')}}</a></li>
            <li><a class="dropdown-item" href="{{route('structure.index')}}">{{__('Структура')}}</a></li>
            <li><a class="dropdown-item" href="{{route('knowledge.index')}}">{{__('Центр знаний')}}</a></li>
            <li><a class="dropdown-item" href="{{route('news.index')}}">{{__('Новости')}}</a></li>
            <li><a class="dropdown-item" href="{{route('entertainment.index')}}">{{__('Развлечения')}}</a></li>
         </ul>
      </div>{{-- Dropdown links start --}}

      <div class="wrapper">
         <a href="{{ route('projects.completed') }}">
            <img src="{{ asset('img/projects_page/completed.jpg') }}">
            <p>{{__('Выполненные проекты')}}</p>
         </a> 

         <a href="{{ route('projects.ongoing') }}">
            <img src="{{ asset('img/projects_page/ongoing.jpg') }}">
            <p>{{__('Действующие проекты')}}</p>
         </a> 
      </div>

   </section>
   
@endsection