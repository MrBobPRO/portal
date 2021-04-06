@extends('templates.master')
@section('content')

   <section class="entertainment-page">
      
      <div class="companynews-header">

         <h3 class="title">{{ __('Развлечения') }}</h3>

         <ul class="crumbs">
            <li class="crumbs-items">
               <a href="/">{{ __('Главная') }}</a>
               <i class="fa fa-square-full"></i>
            </li>
            <li class="crumbs-items">
               <a>{{ __('Развлечения') }}</a>
            </li>
         </ul>  
            
      </div>

   </section>
   
@endsection