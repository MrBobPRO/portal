@extends('templates.master')
@section('content')

@include('templates.breadcrumbs')

   <section class="projects-page">

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