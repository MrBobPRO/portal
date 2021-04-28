@extends('templates.master')
@section('content')

@include('templates.breadcrumbs')

   <section class="books-page">
      <div class="books-list">

         @foreach ($books as $book)
            <a href="{{ route( 'knowledge.books.single', $book->id ) }}" target="_blank">
               @if($book->image != '')
                  <img src="{{ asset('books/imgs/' . $book->image) }}">
               @else
                  <img src="{{ asset('books/imgs/default.jpg') }}">
               @endif
               <h3> {{ $book->name }} </h3>
               <p> {{ $book->description }} </p>   
            </a>   
         @endforeach

      </div>

      {{ $books->links() }}

   </section>

@endsection