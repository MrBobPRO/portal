@extends('templates.master')
@section('content')

   <section class="books-page">
      <ul>

            <li> {{ $book->name }} </li>
            <li> {{ $book->category }} </li>
         

      </ul>
   </section>

@endsection