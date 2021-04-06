@extends('templates.master')
@section('content')
   
   <section class="projects-page">
      
      <h2> {{ __('Проекты и инициативы') }} </h2>
      <div class="projects">
         
         <ul class="projects-list">

            @foreach ($projects as $project)
               
               <li class="projects-items">
                  <a href="projects/{{ $project->id }}">
                     <img src=" {{ asset('img/projects/' . $project->imageUrl) }} " alt="Projects-images">
                     <h3> {{ $project->title }} </h3>
                  </a>
               </li>

            @endforeach

         </ul>

         {{ $projects->links() }}

      </div>

   </section>
   
@endsection