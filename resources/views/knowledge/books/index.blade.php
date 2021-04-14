@extends('templates.master')
@section('content')

   <section class="books-page">
      <ul>

         @foreach ($books as $book)
            <li> {{ $book->name }} </li>
            <li> {{ $book->category }} </li>
         @endforeach

      </ul>
   </section>

@endsection