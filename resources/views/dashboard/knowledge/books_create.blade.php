@extends('dashboard.templates.no_sidebar_master')

@section('content')

   <section class="knowledge-page formed-page">

      <form action="/knowledge_books_store" method="POST" enctype="multipart/form-data">
         @csrf
         <input type="hidden" name="material_id" value="{{ $material->id }}">
         <input type="hidden" name="category" value="{{ $material->category }}">
         <input type="hidden" name="ruCategory" value="{{ $material->name }}">

         <div class="input-container-blocked">
            <label>Название книги</label>
            <input type="text" name="name" required>
         </div>

         <div class="input-container-blocked">
            <label>Файл</label>
            <input type="file" name="upload_file" accept=".pdf" required>
         </div>

         <button class="main-btn" type="submit"><span class="material-icons-outlined">add</span> Добавить</button>

     </form>

   </section>

@endsection