@extends('templates.master')
@section('content')

   <section class="leadership-page">

      <div class="leadership-header">

         <h3 class="title">{{ __('Руководство') }}</h3>

         <ul class="crumbs">
            <li class="crumbs-items">
               <a href="/">{{ __('Главная') }}</a>
               <i class="fa fa-square-full"></i>
            </li>
            <li class="crumbs-items">
               <a href="/about">{{ __('О компании') }}</a>
               <i class="fa fa-square-full"></i>
            </li>
            <li class="crumbs-items">
               <a>{{ __('Руководство') }}</a>
            </li>
         </ul>  

      </div>

      <div class="leadership-content">
         <img src="https://tgem.tj/wp-content/uploads/2018/06/accomplishment-achievement-adult-1153215.jpg" alt="img" loading="lazy">
         <p>В процессе добавления…</p>
      </div>      
      
   </section>

@endsection