@extends('templates.master')
@section('content')

@include('templates.breadcrumbs')

   <section class="books-page">
      
      <div class="books-list">

         @foreach ($books as $book)
            <div class="books-list-item">
               <a href="{{ route( 'knowledge.books.single', $book->id ) }}" target="_blank"> {{ $book->title }} </a>
   
               <form action="/books/download" method="POST">
                  @csrf
                  <input type="hidden" value="{{$book->id}}" name="id">
                  <a class="eye-link" href="{{ route( 'knowledge.books.single', $book->id ) }}" target="_blank">
                     <span class="material-icons-outlined eye-icon">visibility</span>
                  </a>
                  <button type="submit">
                     <span class="material-icons-outlined">file_download</span>
                  </button>
               </form>

            </div>
         @endforeach

      </div>

      {{ $books->links() }}

   </section>

@endsection