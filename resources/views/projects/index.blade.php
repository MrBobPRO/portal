@extends('templates.master')
@section('content')
   
   <section class="projects-page">

      <div class="projects-header">

         <h3 class="title"> {{ __('Проекты и инициативы') }} </h3>

         <ul class="crumbs">
            <li class="crumbs-items">
               <a href=" {{ route('home.index') }} "> {{ __('Главная') }} </a>
               <i class="fa fa-square-full"></i>
            </li>
            <li class="crumbs-items">
               <a>{{ __('Проекты и инициативы') }}</a>
            </li>
         </ul>  

      </div>
      
      <div class="projects">
         
         <ul class="projects-list">

            @foreach ($projects as $project)
               
               <li class="projects-items">
                  <a href="{{ route('projects.showproject', $project->id) }}">
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