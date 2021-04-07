@extends('templates.master')
@section('content')
   
   <section class="knowledge-page">
      
      <div class="knowledge-header">

         <h3 class="title"> {{ __('Центр знаний') }} </h3>

         <ul class="crumbs">
            <li class="crumbs-items">
               <a href=" {{ route('home.index') }} "> {{ __('Главная') }} </a>
               <i class="fa fa-square-full"></i>
            </li>
            <li class="crumbs-items">
               <a>{{ __('Центр знаний') }}</a>
            </li>
         </ul>  

      </div>

      <nav>
         <ul class="knowledge-nav">
            <li class="knowledge-nav-items">
               <a href=" {{ route('english.index') }} "> 
                  <img src="#" alt="img">
                  <span> {{ __('Английский') }} </span>   
               </a>
            </li>
            <li class="knowledge-nav-items">
               <a href=" {{ route('russian.index') }} "> 
                  <img src="#" alt="img">
                  <span> {{ __('Русский') }} </span> 
               </a>
            </li>
            <li class="knowledge-nav-items">
               <a href=" {{ route('business.index') }} ">
                  <img src="#" alt="img">
                  <span> {{ __('Бизнес') }} </span> 
               </a>
            </li>
            <li class="knowledge-nav-items">
               <a href=" {{ route('energy.index') }} ">
                  <img src="#" alt="img">
                  <span> {{ __('Энергетика') }} </span>
               </a>
            </li>
            <li class="knowledge-nav-items">
               <a href=" {{ route('pgs.index') }} ">
                  <img src="#" alt="img">
                  <span> {{ __('ПГС') }} </span>
               </a>
            </li>
            <li class="knowledge-nav-items">
               <a href=" {{ route('itprog.index') }} ">
                  <img src="#" alt="img">
                  <span> {{ __('IT-Программы') }} </span>
               </a>
            </li>
         </ul>
      </nav>

   </section>
   
@endsection