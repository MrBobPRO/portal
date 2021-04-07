@extends('templates.master')
@section('content')
   
<section class="knowledge-page">
      
   <div class="knowledge-header">

      <h3 class="title"> {{ __('Английский') }} </h3>

      <ul class="crumbs">
         <li class="crumbs-items">
            <a href=" {{ route('home.index') }} "> {{ __('Главная') }} </a>
            <i class="fa fa-square-full"></i>
         </li>
         <li class="crumbs-items">
            <a href=" {{ route('knowledge.index') }} "> {{ __('Центр знаний') }} </a>
            <i class="fa fa-square-full"></i>
         </li>
         <li class="crumbs-items">
            <a>{{ __('Английский') }}</a>
         </li>
      </ul>  

   </div>

   <nav>
      <ul class="english-nav">
         <li class="english-nav-items">
            <a href=" {{ route('english.beginner') }} "> {{ __('Начинающий') }} </a>
         </li>
         <li class="english-nav-items">
            <a href=" {{ route('english.intermediate') }} "> {{ __('Средний') }} </a>
         </li>
         <li class="english-nav-items">
            <a href=" {{ route('english.upperintermediate') }} "> {{ __('Выше среднего') }} </a>
         </li>
         <li class="english-nav-items">
            <a href=" {{ route('english.expert') }} "> {{ __('Эксперт') }} </a>
         </li>
         <li class="english-nav-items">
            <a href=" {{ route('english.mastery') }} "> {{ __('Мастер') }} </a>
         </li>
      </ul>
   </nav>

</section>
   
@endsection