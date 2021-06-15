@extends('dashboard.templates.no_sidebar_master')

@section('content')

   <section class="news-single-page formed-page">
      <form action="/update_galleries" method="POST" enctype="multipart/form-data">

         <input type="hidden" name="id" value="{{$gallery->id}}">

         @csrf
         <div class="input-container-blocked">
            <label>{{__('Заголовок на русском')}}<span class="required">*</span></label>
            <input type="text" name="ruTitle" value="{{ $gallery->ruTitle }}" required>
         </div>

         <div class="input-container-blocked">
            <label>{{__('Заголовок на таджикском')}}<span class="required">*</span></label>
            <input type="text" name="tjTitle" value="{{ $gallery->tjTitle }}" required>
         </div>

         <div class="input-container-blocked">
            <label>{{__('Заголовок на английском')}}<span class="required">*</span></label>
            <input type="text" name="enTitle" value="{{ $gallery->enTitle }}" required>
         </div>

         <div class="input-container-blocked">
            <label>{{__('Дата')}}<span class="required">*</span></label>
            <input type="date" name="date" value="{{ $gallery->date }}" required>
         </div>

         <div class="input-container-blocked">
            <label>{{__('Изображение')}}</label>
            <input type="file" name="image" accept="image/*">
            <img class="form-image" src="{{asset('img/entertainment/galleries/' . $gallery->image)}}">
         </div>

         <div class="spaced-btw-btns">
            <button class="main-btn delete-btn" type="button" data-bs-toggle="modal" data-bs-target="#deleteModal"><span class="material-icons-outlined">delete</span> {{__('Удалить')}}</button>
            <button class="main-btn" type="submit"><span class="material-icons-outlined">edit</span> {{__('Сохранить изменения')}}</button>
         </div>

     </form>

     <div class="input-container-blocked">
         <h2 class="title-seperator">{{__('Картинки')}}</h2>
         @if(!count($gallery->images)) 
            <label>{{__('Картинки отсуствуют')}}. {{__('Для добавления используйте нижний блок')}}!</label>
         @endif

         <div class="gallery-images-container">
            @foreach($gallery->images as $img)
               <div title="Удалить">
                  <img src="{{ asset('img/entertainment/images/' . $img->filename) }}">
                  <span class="material-icons-outlined" onclick="ajax_delete_gallery_image('{{$img->filename}}')">delete_forever</span>
               </div>
            @endforeach
         </div>
      </div>

     <div class="input-container-blocked dropzone-block">
      <h2 class="title-seperator">{{__("Добавить картинки")}}</h2>
         <div class="dropzone" id="dropzone">
            <div class="fallback">
               @csrf
               <input name="file" type="file" multiple accept="image/*"/>
             </div>
         </div>
      </div>

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

               <form action="/remove_galleries" method="POST">
                  {{ csrf_field() }}
                  <input type="hidden" value="{{$gallery->id}}" name="id"/>
                  <button type="submit" class="main-btn delete-btn">{{__('Удалить')}}</button>
               </form>
            </div>
         </div>
      </div>
   </div>
   <!-- Delete Modal end-->

@endsection