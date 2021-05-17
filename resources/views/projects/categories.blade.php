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

               @switch(\App::currentLocale())
                  @case('ru')
                     <h3>{{ $project->ruTitle }}</h3>
                     <p>{!! $project->ruText !!}</p> 
                     <span class="project-date">
                        <?php 
                           $date = \Carbon\Carbon::parse($project->created_at)->locale('ru');
                           $formatted = $date->isoFormat('DD MMMM YYYY');
                        ?>
                        {{$formatted}}
                     </span>
                  @break
                  
                  @case('tj')
                     <h3>{{ $project->tjTitle }}</h3>
                     <p>{!! $project->tjText !!}</p> 
                     <span class="project-date">
                        <?php 
                           $date = \Carbon\Carbon::parse($project->created_at)->locale('ru');
                           $formatted = $date->isoFormat('DD.MM.YYYY');
                        ?>
                        {{$formatted}}
                     </span>
                  @break

                  @case('en')
                     <h3>{{ $project->enTitle }}</h3>
                     <p>{!! $project->enText !!}</p> 
                     <span class="project-date">
                        <?php 
                           $date = \Carbon\Carbon::parse($project->created_at)->locale('en');
                           $formatted = $date->isoFormat('DD MMMM YYYY');
                        ?>
                        {{$formatted}}
                     </span>
                  @break
               @endswitch

               </a>
            </div>
         @endforeach

         {{$projects->links()}}
      </div>
      {{-- Project category end --}}

   </section>
   
@endsection