@extends('templates.master')
@section('content')
   
<section class="knowledge-page">
      
   <div class="knowledge-header">

      <h3 class="title"> {{ __('ПГС') }} </h3>

      <ul class="crumbs">
         <li class="crumbs-items">
            <a href="/"> {{ __('Главная') }} </a>
            <i class="fa fa-square-full"></i>
         </li>
         <li class="crumbs-items">
            <a href="/knowledge"> {{ __('Центр знаний') }} </a>
            <i class="fa fa-square-full"></i>
         </li>
         <li class="crumbs-items">
            <a>{{ __('ПГС') }}</a>
         </li>
      </ul>  

   </div>

</section>
   
@endsection