@extends('dashboard.templates.no_sidebar_master')

@section('content')

   <section class="knowledge-page">

      <a class="add-button" href="{{route('dashboard.knowledge.create')}}"><span class="material-icons-outlined">add</span></a>

      <div class="dash-search-container">
         {{-- Books search start --}}
         <div class="select2_single_container">
            <select class="select2_single select2_single_linked" data-placeholder="{{__('Поиск книг')}} ..." data-dropdown-css-class="select2_single_dropdown">
               <option></option>
               @foreach($allBooks as $allBook)
                  <option value="{{ route('dashboard.knowledge.books.single', $allBook->id)}}">{{$allBook->title}}</option>   
               @endforeach
            </select>
         </div>
         {{-- Books search end --}}
      </div>

      
      <div class="primary-list-titles">
         <div class="book-item width-33">{{__('Заголовок')}}</div>
         <div class="book-item width-33">{{__('Категория')}}</div>
         <div class="book-item width-33">{{__('Дата добавления')}}</div>
      </div>

      <div class="primary-list">
         @foreach($books as $book)
            <a class="primary-list-item" href="{{ route('dashboard.knowledge.books.single', $book->id)}}">
               <div class="width-33">{{ $book->title }}</div>
               <div class="book-list-item width-33">{{ __($book->ruCategory) }}</div>
               <div class="width-33">
                  <?php 
                     $date = \Carbon\Carbon::parse($book->created_at)->locale('ru');
                     $formatted = $date->isoFormat('DD MMMM YYYY H:mm:s');
                  ?>
                  {{$formatted}}
               </div>
            </a>
         @endforeach
      </div>

      {{$books->links()}}

   </section>

@endsection