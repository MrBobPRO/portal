@extends('templates.master')
@section('content')

@include('templates.breadcrumbs')

   <section class="projects-page">

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