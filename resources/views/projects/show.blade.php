@extends('templates.master')
@section('content')
   
   <section class="show-page">
      <h2> {{ $project->title }} </h2>
      
      <div class="show-project">
         <img onclick="showModal('{{ asset('img/projects/'. $project->imageUrl) }}')" src=" {{ asset('img/projects/' . $project->imageUrl) }} " alt="image">
         <p> {{ $project->text }} </p>
      </div>

   </section>

   <div class="image-modal" id="image-modal">
      <img id="modal-img" src="#" alt="img">
      <span class="close" onclick="hideModal()"><i class="fa fa-times"></i> </span>
   </div> 
   
@endsection