@extends('dashboard.templates.no_sidebar_master')

@section('content')

   {{-- Spinner used while form submit --}}
   <div class="spinner-container" id="spinner-container">
      <div class="spinner-border" role="status">
         <span class="visually-hidden">Loading...</span>
      </div>
      <p>Пожалуйста дождитесь загрузки файла на сервер<br>Размер файла : <span id="spinner_file_size"></span>
         Загружено : <span id="spinner_uploaded_percent"></span>
      </p>
   </div>

   <section class="news-single-page formed-page">
      <form method="POST" enctype="multipart/form-data" onsubmit="videos_update()" id="videos_update_form">

         <input type="hidden" name="id" id="id" value="{{$video->id}}">
         @csrf

         <div class="input-container-blocked">
            <label>Файл. Поддерживаемые форматы (mp4, webm, ogg)</label>
            <input type="file" name="file" id="file" accept=".mp4, .webm, .ogg">
            <video width="400" height="240" controls>
               <source src="{{asset('videos/entertainment/'. $video->filename)}}">
            </video>
         </div>

         <div class="input-container-blocked">
            <label>Субтитры. {{$video->subtitles == '' ? 'Отсуствуют.' : 'Имеется.'}} Поддерживаемые форматы (vtt)</label>
            <input type="file" name="subtitles" accept=".vtt">
         </div>

         <div class="input-container-blocked">
             <label>Заголовок на русском</label>
             <input type="text" name="ruTitle" value="{{ $video->ruTitle }}" required>
         </div>

         <div class="input-container-blocked">
               <label>Заголовок на таджикском</label>
               <input type="text" name="tjTitle" value="{{ $video->tjTitle }}" required>
         </div>

         <div class="input-container-blocked">
               <label>Заголовок на английском</label>
               <input type="text" name="enTitle" value="{{ $video->enTitle }}" required>
         </div>

         <div class="input-container-blocked">
            <label>Постер</label>
            <input type="file" name="poster" accept=".jpg, .png, .jpeg">
            <img class="form-image" src="{{asset('videos/entertainment/posters/' . $video->poster)}}">
         </div>

         <button class="main-btn" type="submit"><span class="material-icons-outlined">edit</span> Сохранить изменения</button>
     </form>
   </section>

@endsection