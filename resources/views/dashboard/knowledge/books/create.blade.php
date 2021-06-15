@extends('dashboard.templates.no_sidebar_master')

@section('content')

   <section class="knowledge-page formed-page">

      <form action="/store_books" method="POST" enctype="multipart/form-data">
         @csrf
         <input type="hidden" name="material_id" value="{{ $material->id }}">
         <input type="hidden" name="category" value="{{ $material->category }}">
         <input type="hidden" name="ruCategory" value="{{ $material->name }}">

         <div class="input-container-blocked">
            <label>{{__('Название книги на русском')}}<span class="required">*</span></label>
            <input type="text" name="ruTitle" required> 
         </div>

         <div class="input-container-blocked">
            <label>{{__('Название книги на таджикском')}}<span class="required">*</span></label>
            <input type="text" name="tjTitle" required> 
         </div>

         <div class="input-container-blocked">
            <label>{{__('Название книги на английском')}}<span class="required">*</span></label>
            <input type="text" name="enTitle" required>
         </div>

         <div class="input-container-blocked">
            <label>{{__('Файл')}}<span class="required">*</span></label>
            <input type="file" name="upload_file" accept=".pdf" required>
         </div>

         <button class="main-btn" type="submit"><span class="material-icons-outlined">add</span> {{__('Добавить')}}</button>

     </form>

   </section>

@endsection