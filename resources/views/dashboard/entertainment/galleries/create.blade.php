@extends('dashboard.templates.no_sidebar_master')

@section('content')

   <section class="news-single-page formed-page">
      <form action="/store_galleries" method="POST" enctype="multipart/form-data">

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
            <label>Дата</label>
            <input type="date" name="date" required>
         </div>

         <div class="input-container-blocked">
            <label>Изображение</label>
            <input type="file" name="image" accept="image/*">
         </div>

         <button class="main-btn" type="submit"><span class="material-icons-outlined">add</span> Добавить</button>
     </form>
   </section>

@endsection