@extends('dashboard.templates.no_sidebar_master')

@section('content')

   {{-- Spinner used while form submit --}}
   <div class="spinner-container" id="spinner-container">
      <div class="spinner-border" role="status">
         <span class="visually-hidden">{{__('Загрузка')}}...</span>
      </div>
      <p>{{__('Пожалуйста дождитесь загрузки файла на сервер')}}<br>{{__('Размер файла')}} : <span id="spinner_file_size"></span>
         {{__('Загружено')}} : <span id="spinner_uploaded_percent"></span>
      </p>
   </div>

   <section class="news-single-page formed-page">
      <form method="POST" enctype="multipart/form-data" onsubmit="videos_update()" id="videos_update_form">

         <input type="hidden" name="id" id="id" value="{{$video->id}}">
         @csrf

         <div class="input-container-blocked">
            <label>{{__('Файл')}}. {{__('Поддерживаемые форматы')}} (mp4, webm, ogg)@if($video->from_catalog). {{__('Видео выбрано из каталога')}}: {{$video->filename}}@endif</label>
            <input type="file" onchange="clear_catalog_input()" name="file" id="file" accept=".mp4, .webm, .ogg">
            <video class="video" width="400" height="240" controls>
               @if($video->from_catalog)
                  <source src="{{asset('catalog/videos/' . $video->filename)}}">
               @else
                  <source src="{{asset('videos/entertainment/' . $video->filename)}}">
               @endif
            </video>
         </div>

         <div class="input-container-blocked">
            <label><a href="#" data-bs-toggle="modal" data-bs-target="#catalogModal">{{__('Выбрать видео из каталога')}} !</a></label>
            <input type="text" name="catalog" id="catalog" readonly> 
         </div>

         <div class="input-container-blocked">
            <label>{{__('Субтитры')}}. {{$video->subtitles == '' ? 'Отсуствуют.' : 'Имеется.'}} {{__('Поддерживаемые форматы')}} (vtt)</label>
            <input type="file" name="subtitles" accept=".vtt">
         </div>

         <div class="input-container-blocked">
             <label>{{__('Заголовок на русском')}}<span class="required">*</span></label>
             <input type="text" name="ruTitle" value="{{ $video->ruTitle }}" required>
         </div>

         <div class="input-container-blocked">
               <label>{{__('Заголовок на таджикском')}}<span class="required">*</span></label>
               <input type="text" name="tjTitle" value="{{ $video->tjTitle }}" required>
         </div>

         <div class="input-container-blocked">
               <label>{{__('Заголовок на английском')}}<span class="required">*</span></label>
               <input type="text" name="enTitle" value="{{ $video->enTitle }}" required>
         </div>

         <div class="input-container-blocked">
            <label>{{__('Постер')}}</label>
            <input type="file" name="poster" accept="image/*">
            <img class="form-image" src="{{asset('videos/entertainment/posters/' . $video->poster)}}">
         </div>

         <div class="spaced-btw-btns">
            <button class="main-btn delete-btn" type="button" data-bs-toggle="modal" data-bs-target="#deleteModal"><span class="material-icons-outlined">delete</span> {{__('Удалить')}}</button>
            <button class="main-btn" type="submit"><span class="material-icons-outlined">edit</span> {{__('Сохранить изменения')}}</button>
         </div>

     </form>
   </section>


<!-- Delete Modal start-->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModal" aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="deleteModal">{{__('Удалить')}}</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
         </div>
         <div class="modal-body">
            {{__('Вы уверены что хотите удалить?')}}
         </div>
         <div class="modal-footer">
            <button type="button" class="main-btn" data-bs-dismiss="modal">{{__('Отмена')}}</button>

            <form action="/remove_video" method="POST">
               {{ csrf_field() }}
               <input type="hidden" value="{{$video->id}}" name="id"/>
               <button type="submit" class="main-btn delete-btn">{{__('Удалить')}}</button>
            </form>
         </div>
      </div>
   </div>
</div>
<!-- Delete Modal end-->


<!-- Catalog Modal start-->
<div class="modal fade catalog-modal" id="catalogModal" tabindex="-1" aria-labelledby="catalogModalLabel" aria-hidden="true">
   <div class="modal-dialog modal-fullscreen">
      <div class="modal-content">

         <div class="modal-header">
            <h5 class="modal-title" id="catalogModalLabel">
               <span class="material-icons-outlined">videocam</span> {{__('Выбрать видео из каталога')}}
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


@endsection