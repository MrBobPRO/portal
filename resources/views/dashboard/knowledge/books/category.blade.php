@extends('dashboard.templates.no_sidebar_master')

@section('content')

   <section class="knowledge-page">

      <a class="add-button" href="{{route('dashboard.knowledge.books.create', $material->id)}}"><span class="material-icons-outlined">add</span></a>

      <div class="primary-list-titles">
         <div class="width-33">{{__('Заголовок')}}</div>
         <div class="width-33">{{__('Категория')}}</div>
         <div class="width-33">{{__('Дата добавления')}}</div>
      </div>

      <div class="primary-list">
         @foreach($books as $book)
            <a class="primary-list-item" href="{{ route('dashboard.knowledge.books.single', $book->id)}}">
               <div class="width-33">{{ $book->title }}</div>
               <div class="width-33">{{ __($book->ruCategory) }}</div>
               <div class="width-33 admin-edit-btn">
                  <?php 
                     $date = \Carbon\Carbon::parse($book->created_at)->locale('ru');
                     $formatted = $date->isoFormat('DD MMMM YYYY H:mm:s');
                  ?>
                  {{$formatted}}
                  <span class="material-icons-outlined">edit</span>
               </div>
            </a>
         @endforeach
      </div>

      {{$books->links()}}

   </section>

@endsection