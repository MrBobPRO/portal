@extends('templates.master')
@section('content')

@include('templates.breadcrumbs')

   <section class="projects-page">

      {{-- Project category start --}}
      <div class="category">

         <?php 
            $appLocale = \App::currentLocale(); 
            //genereate translation column names
            $n_title = $appLocale . 'Title';
            $n_text = $appLocale . 'Text';
            //Generate News Date Locale from appLocale
            if($appLocale == 'en') $n_date_locale = 'en';
            else $n_date_locale = 'ru';
         ?>

         @foreach ($projects as $project)
            <div class="single-project">
               <img src="{{ asset('img/projects/'. $project->image) }}">
               <a href="{{route('projects.single', $project->id)}}">

                  <h3>{{ $project[$n_title] }}</h3>
                  <p>{!! preg_replace('#<[^>]+>#', ' ', $project[$n_text]) !!}</p> 
                  <span class="project-date">
                     <?php 
                        $date = \Carbon\Carbon::parse($project->created_at)->locale($n_date_locale);
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