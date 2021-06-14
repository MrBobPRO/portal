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
      
      <form onsubmit="knowledge_videos_create()" id="videos_create_form">
         @csrf
         <input type="hidden" name="material_id" value="{{ $material->id }}">
         <input type="hidden" name="category" value="{{ $material->category }}">
         <input type="hidden" name="ruCategory" value="{{ $material->name }}">
         
         <div class="input-container-blocked">
            <label>Файл. Поддерживаемые форматы (mp4, webm, ogg)</label>
            <input 
               type="file" 
               onchange="clear_catalog_input()"
               name="file" 
               id="file" 
               accept=".mp4, .webm, .ogg" 
            >
         </div>

         <div class="input-container-blocked">
            <label>Субтитры. Поддерживаемые форматы (vtt). (Необъязательно заполнять)</label>
            <input type="file" name="subtitles" accept=".vtt">
         </div>

         <div class="input-container-blocked">
            <label><a href="#" data-bs-toggle="modal" data-bs-target="#catalogModal">Выбрать видео из каталога !</a></label>
            <input type="text" name="catalog" id="catalog" readonly>
         </div>

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
            <label>Постер. По умолчанию постером будет нижняя картинка. (Необъязательно заполнять)</label>
            <input type="file" name="poster" accept="image/*">
            <img class="form-image" src="{{asset('videos/entertainment/posters/default.jpg')}}">
         </div>

         <button class="main-btn" type="submit"><span class="material-icons-outlined">add</span> Добавить видео</button>
     </form>

      <!-- Catalog Modal start-->
      <div class="modal fade catalog-modal" id="catalogModal" tabindex="-1" aria-labelledby="catalogModalLabel" aria-hidden="true">
         <div class="modal-dialog modal-fullscreen">
            <div class="modal-content">

               <div class="modal-header">
                  <h5 class="modal-title" id="catalogModalLabel">
                     <span class="material-icons-outlined">videocam</span> Выбрать видео из каталога
                  </h5>
                  <button type="button" data-bs-dismiss="modal" aria-label="Close">
                     <span class="material-icons-outlined">close</span>
                  </button>
               </div>

               <div class="modal-body">
                  <div class="catalog-list">
                     @foreach ($files as $file)
                        <div class="catalog-item">
                           <video controls src="/catalog/videos/{{$file}}"></video>
                           <p onclick="catalog_video_selected('{{$file}}')">{{$file}}</p>
                        </div>
                     @endforeach
                  </div>
               </div>

            </div>
         </div>
      </div>
      <!-- Catalog Modal end-->
      
   </section>

@endsection