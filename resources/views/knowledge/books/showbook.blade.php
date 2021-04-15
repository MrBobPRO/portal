@extends('templates.master')
@section('content')

   <section class="books-page">

      <div class="knowledge-header">

         <h3 class="title"> {{ __( $book->name ) }} </h3>

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
               <a href=" {{ route('knowledge.books.index', $material->id) }} "> {{ __( $material->name ) }} </a>
               <i class="fa fa-square-full"></i>
            </li>
            <li class="crumbs-items">
               <a> {{ __( $book->name ) }} </a>
            </li>
         </ul>  

      </div>

      <ul>

            <li> {{ $book->name }} </li>
            <li> {{ $book->category }} </li>
         
      </ul>
   </section>

@endsection