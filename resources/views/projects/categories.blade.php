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

      {{-- Project category start --}}
      <div class="category">

         <?php $appLocale = \App::currentLocale(); ?>

         @foreach ($projects as $project)
            <div class="single-project">
               <img src="{{ asset('img/projects/'. $project->image) }}">
               <a href="{{route('projects.single', $project->id)}}">

                  <?php
                     // Generate projects title from appLocale
                     $projectsTitle = $project[$appLocale . 'Title'];

                     //Generate projects Date Locale from appLocale
                     if($appLocale == 'en') 
                        $projectsDateLocale = 'en';
                     else
                        $projectsDateLocale = 'ru';

                     // Generate projects text from appLocale
                     $projectsText = $project[$appLocale . 'Text'];
                     //Replace all tags by space
                     $projectsText = preg_replace('#<[^>]+>#', ' ', $projectsText);
                  ?>

                  <h3>{{ $projectsTitle }}</h3>
                  <p>{!! $projectsText !!}</p> 
                  <span class="project-date">
                     <?php 
                        $date = \Carbon\Carbon::parse($project->created_at)->locale($projectsDateLocale);
                        $formatted = $date->isoFormat('DD MMMM YYYY');
                     ?>
                     {{$formatted}}
                  </span>

               </a>
            </div>
         @endforeach

         {{$projects->links()}}
      </div>
      {{-- Project category end --}}

   </section>
   
@endsection