@extends('dashboard.templates.no_sidebar_master')

@section('content')

<section class="knowledge-page formed-page">

   <form action="/knowledge_books_update" method="POST" enctype="multipart/form-data">
      @csrf
      <input type="hidden" name="book_id" value="{{ $book->id }}">
      <div class="input-container-blocked">
         <label>Название книги</label>
         <input type="text" name="name" value="{{ $book->name }}" required>
      </div>

      <div class="input-container-blocked">
         <label>Изменить файл / <a href="{{ route('knowledge.books.single', $book->id) }}" target="_blank">Посмотреть книгу</a></label>
         <input type="file" name="file" accept=".pdf">
      </div>

      <button class="main-btn" type="submit"><span class="material-icons-outlined">add</span> Обновить книгу</button>
   </form>

   {{-- <form action="/knowledge_books_delete" method="POST" enctype="multipart/form-data">
      @csrf
      <input type="hidden" name="book_id" value="{{ $book->id }}">
      <button class="main-btn" style="margin: unset; margin-top: -44px; background-color: #bb1515;" type="submit">Удалить книгу</button>
   </form> --}}

</section>

@endsection