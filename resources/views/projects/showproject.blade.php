@extends('templates.master')
@section('content')
   
   <section class="show-page">

      <div class="projects-header">

         <h3 class="title"> {{ $project->title }} </h3>

         <ul class="crumbs">
            <li class="crumbs-items">
               <a href=" {{ route('home.index') }} "> {{ __('Главная') }} </a>
               <i class="fa fa-square-full"></i>
            </li>
            <li class="crumbs-items">
               <a href=" {{ route('projects.index') }} "> {{ __('Проекты и инициативы') }} </a>
               <i class="fa fa-square-full"></i>
            </li>
            <li class="crumbs-items">
               <a> {{ $project->title }} </a>
            </li>
         </ul>  

      </div>

      <h2></h2>
      
      <div class="show-project">
         <img onclick="showModal('{{ asset('img/projects/'. $project->image) }}')" src=" {{ asset('img/projects/' . $project->image) }} " alt="image">
         <p> {{ $project->text }} </p>
      </div>

   </section>

   <div class="image-modal" id="image-modal">
      <img id="modal-img" src="#" alt="img">
      <span class="close" onclick="hideModal()"><i class="fa fa-times"></i> </span>
   </div> 
   
@endsection