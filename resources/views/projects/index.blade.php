@extends('templates.master')
@section('content')

@include('templates.breadcrumbs')

   <section class="projects-page">

      <div class="projects-list">
            <a href="{{ route('projects.completed') }}">
               <img src="{{ asset('img/projects/completed.jpg') }}">
               <div>
                  <p>Выполненные проекты</p>
               </div>
            </a>
            <a href="{{ route('projects.uncompleted') }}">
               <img src="{{ asset('img/projects/uncompleted.jpg') }}">
               <div>
                  <p>Действующие проекты</p>
               </div>
            </a>
      </div>

   </section>
   
@endsection