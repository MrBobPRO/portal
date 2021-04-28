@extends('templates.master')
@section('content')

@include('templates.breadcrumbs')

   <section class="projects-page">

      <div class="projects-list">
         @foreach ($projects as $project)
            <a href="{{ route('projects.single', $project->id) }}">
               <img src="{{ asset('img/projects/' . $project->image) }}">

               <div>
                  <p>{{$project->title}}</p>
                  <span>
                     <?php 
                        $date = \Carbon\Carbon::parse($project->created_at)->locale('ru');
                        $formatted = $date->isoFormat('DD MMMM YYYY');
                     ?>
                     {{$formatted}}
                  </span>
               </div>
            </a>
         @endforeach
      </div>

      {{ $projects->links() }}

   </section>
   
@endsection