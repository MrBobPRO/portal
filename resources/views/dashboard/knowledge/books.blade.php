@extends('dashboard.templates.no_sidebar_master')

@section('content')

   <section class="knowledge-page">

      <div class="dash-search-container">
         {{-- Books search start --}}
         <div class="select2_single_container">
            <select class="select2_single select2_single_linked" data-placeholder="Поиск новостей..." data-dropdown-css-class="select2_single_dropdown">
               <option></option>
               @foreach($allBooks as $allBook)
                  <option value="{{ route('dashboard.knowledge.books.single', $allBook->id)}}">{{$allBook->name}}</option>   
               @endforeach
            </select>
         </div>
         {{-- Books search end --}}
         <a class="add-button" href="{{route('dashboard.knowledge.create')}}"><span class="material-icons-outlined">add</span></a>
      </div>

      
      <div class="primary-list-titles">
         <div class="width-33">Заголовок</div>
         <div class="width-33">Категория</div>
         <div class="width-33">Дата добавления</div>
      </div>

      <div class="primary-list">
         @foreach($books as $book)
            <a class="primary-list-item" href="{{ route('dashboard.knowledge.books.single', $book->id)}}">
               <div class="width-33">{{ $book->name }}</div>
               <div class="width-33">{{ $book->ruCategory }}</div>
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