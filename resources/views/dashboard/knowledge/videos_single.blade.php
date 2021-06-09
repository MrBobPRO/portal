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

   <section class="knowledge-page formed-page">
      <form onsubmit="knowledge_videos_update()" id="videos_update_form">
         <input type="hidden" name="id" id="id" value="{{$video->id}}">
         @csrf

         <div class="input-container-blocked">
            <label>Файл. Поддерживаемые форматы (mp4, webm, ogg)</label>
            <input type="file" name="file" id="file" accept=".mp4, .webm, .ogg">
            <video width="400" height="240" controls>
               <source src="{{asset('videos/knowledge/'. $video->filename)}}">
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
            <img class="form-image" src="{{asset('videos/knowledge/posters/' . $video->poster)}}">
         </div>

         <div class="spaced-btw-btns">
            <button class="main-btn delete-btn" type="button" data-bs-toggle="modal" data-bs-target="#deleteModal"><span class="material-icons-outlined">delete</span> Удалить</button>
            <button class="main-btn" type="submit"><span class="material-icons-outlined">edit</span> Сохранить изменения</button>
         </div>

     </form>
   </section>


   <!-- Delete Modal start-->
   <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModal" aria-hidden="true">
      <div class="modal-dialog">
         <div class="modal-content">
            <div class="modal-header">
               <h5 class="modal-title" id="deleteModal">Удалить</h5>
               <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
               Вы уверены что хотите удалить?
            </div>
            <div class="modal-footer">
               <button type="button" class="main-btn" data-bs-dismiss="modal">Отмена</button>

               <form action="/remove_knowledge_videos" method="POST">
                  {{ csrf_field() }}
                  <input type="hidden" value="{{$video->id}}" name="id"/>
                  <button type="submit" class="main-btn delete-btn">Удалить</button>
               </form>
            </div>
         </div>
      </div>
   </div>
   <!-- Delete Modal end-->

@endsection