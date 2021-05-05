@extends('templates.master')
@section('content')

@include('templates.breadcrumbs')

   <section class="projects-page">

      {{-- Project category start --}}
      <div class="category">
         @foreach ($projects as $project)
            <div class="single-project">
               <img src="{{ asset('img/projects/'. $project->image) }}">
               <a href="{{route('projects.single', $project->id)}}">
                  <h3>{{$project->title}}</h3>
                  <p>{{$project->text}}</p>
                  <span class="project-date">
                     <?php 
                        $date = \Carbon\Carbon::parse($project->created_at)->locale('ru');
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