@extends('templates.master')
@section('content')
   
<section class="knowledge-page">
      
   <div class="knowledge-header">

      <h3 class="title"> {{ __('Выше среднего') }} </h3>

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
            <a href=" {{ route('english.index') }} "> {{ __('Английский') }} </a>
            <i class="fa fa-square-full"></i>
         </li>
         <li class="crumbs-items">
            <a>{{ __('Выше среднего') }}</a>
         </li>
      </ul>  

   </div>

</section>
   
@endsection