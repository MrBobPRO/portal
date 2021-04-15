@extends('templates.master')
@section('content')

   <section class="books-page">

      <div class="knowledge-header">

         <h3 class="title"> {{ __( $material->name ) }} </h3>

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
               <a> {{ __( $material->name ) }} </a>
            </li>
         </ul>  

      </div>
      
      <div class="book-list">
         <ul>

            @foreach ($books as $book)

               <li class="book-items">
                  <a href=" {{ route( 'knowledge.books.showbook', $book->id ) }} ">
                     <img src=" {{ asset('img/books/' . $book->image) }} " alt="books image">
                     <h4> {{ $book->name }} </h4>               
                  </a>   
               </li>

            @endforeach

         </ul>

         {{ $books->links() }}

      </div>


   </section>

@endsection