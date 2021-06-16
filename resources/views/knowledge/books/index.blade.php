@extends('templates.master')
@section('content')

@include('templates.breadcrumbs')

   <section class="books-page">

      {{-- Dropdown links start --}}
      <div class="dropdown navbar-dropdown">
         <a class="btn btn-secondary dropdown-toggle" href="{{route('knowledge.index')}}" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
         {{__('Центр знаний')}}
         </a>
      
         <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
            <li><a class="dropdown-item" href="{{route('home.index')}}">{{__('Главная')}}</a></li>
            <li><a class="dropdown-item" href="{{route('structure.index')}}">{{__('Структура')}}</a></li>
            <li><a class="dropdown-item" href="{{route('news.index')}}">{{__('Новости')}}</a></li>
            <li><a class="dropdown-item" href="{{route('projects.index')}}">{{__('Проекты и инициативы')}}</a></li>
            <li><a class="dropdown-item" href="{{route('entertainment.index')}}">{{__('Развлечения')}}</a></li>
         </ul>
      </div>{{-- Dropdown links start --}}
      
      <div class="books-list">

         @foreach ($books as $book)
            <div class="books-list-item">
               <a href="{{ route( 'knowledge.books.single', $book->id ) }}" target="_blank"> {{ $book->title }} </a>
   
               <form action="/books/download" method="POST">
                  @csrf
                  <input type="hidden" value="{{$book->id}}" name="id">
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