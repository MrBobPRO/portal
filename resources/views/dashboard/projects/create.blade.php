@extends('dashboard.templates.no_sidebar_master')

@section('content')

   <section class="news-single-page formed-page">
      <form action="/store_projects" method="POST" enctype="multipart/form-data">

         @csrf
         <div class="input-container-blocked">
             <label>Заголовок на русском</label>
             <input type="text" name="ruTitle" required>
         </div>

         <div class="input-container-blocked">
               <label>Заголовок на таджикском</label>
               <input type="text" name="tjTitle" required>
         </div>

         <div class="input-container-blocked">
               <label>Заголовок на английском</label>
               <input type="text" name="enTitle" required>
         </div>

         <div class="input-container-blocked">
            <label>Тип</label>
            <div class="select2_single_container">
               <select class="select2_single" name="completed" required data-dropdown-css-class="select2_single_dropdown">
                  <option value="1">Выполненный проект</option>
                  <option value="0">Действующий проект</option>
               </select>
            </div>
         </div>

         <div class="input-container-blocked">
            <label>Картинка</label>
            <input type="file" name="image" accept="image/*">
         </div>

         <div class="input-container-blocked">
            <label>Текст на русском</label>
            <div class="simditor_container">
               <textarea class="simditor-wysiwyg" name="ruText" rows="8" required></textarea>
            </div>
         </div>

         <div class="input-container-blocked">
            <label>Текст на таджикском</label>
            <div class="simditor_container">
               <textarea class="simditor-wysiwyg" name="tjText" rows="8" required></textarea>
            </div>
         </div>

         <div class="input-container-blocked">
            <label>Текст на английском</label>
            <div class="simditor_container">
               <textarea class="simditor-wysiwyg" name="enText" rows="8" required></textarea>
            </div>
         </div>

         <button class="main-btn" type="submit"><span class="material-icons-outlined">add</span> Добавить</button>
     </form>
   </section>

@endsection