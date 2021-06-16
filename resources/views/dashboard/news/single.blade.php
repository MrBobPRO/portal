@extends('dashboard.templates.no_sidebar_master')

@section('content')

   <section class="news-single-page formed-page">
      <form action="/update_news" method="POST" enctype="multipart/form-data">

         <input type="hidden" name="id" value="{{$news->id}}">

         @csrf
         <div class="input-container-blocked">
             <label>{{__('Заголовок на русском')}}<span class="required">*</span></label>
             <input type="text" name="ruTitle" value="{{ $news->ruTitle }}" required>
         </div>

         <div class="input-container-blocked">
               <label>{{__('Заголовок на таджикском')}}<span class="required">*</span></label>
               <input type="text" name="tjTitle" value="{{ $news->tjTitle }}" required>
         </div>

         <div class="input-container-blocked">
               <label>{{__('Заголовок на английском')}}<span class="required">*</span></label>
               <input type="text" name="enTitle" value="{{ $news->enTitle }}" required>
         </div>

         <div class="input-container-blocked">
            <label>{{__('Тип')}}<span class="required">*</span></label>
            <div class="select2_single_container">
               <select class="select2_single" name="global" required data-dropdown-css-class="select2_single_dropdown">
                  <option value="1" {{$news->global ? 'selected' : ''}}>{{__('Мировые новости')}}</option>
                  <option value="0" {{$news->global ? '' : 'selected'}}>{{__('Новости компании')}}</option>
               </select>
            </div>
         </div>

         <div class="input-container-blocked">
            <label>{{__('Картинка')}}</label>
            <input type="file" name="image" accept="image/*">
            <img class="form-image" src="{{asset('img/news/' . $news->image)}}">
         </div>

         <div class="input-container-blocked">
            <label>{{__('Видео')}}. {{__('Поддерживаемые форматы')}} (mp4, webm, ogg).
               @if($news->video != '')
                  <a href="javascript:void(0)" onclick="document.getElementById('delete_news_video').submit()"> Удалить видео</a>
               @endif
            </label>
            <input type="file" name="video" id="file" accept=".mp4, .webm, .ogg">
            @if($news->video != '')
               <video width="400" height="240" controls>
                  <source src="{{asset('videos/news/'. $news->video)}}">
               </video>
            @endif
         </div>

         <div class="input-container-blocked">
            <label>{{__('Текст на русском')}}<span class="required">*</span></label>
            <div class="simditor_container">
               <textarea class="simditor-wysiwyg" name="ruText" rows="8" required>{{ $news->ruText }}</textarea>
            </div>
         </div>

         <div class="input-container-blocked">
            <label>{{__('Текст на таджикском')}}<span class="required">*</span></label>
            <div class="simditor_container">
               <textarea class="simditor-wysiwyg" name="tjText" rows="8" required>{{ $news->tjText }}</textarea>
            </div>
         </div>

         <div class="input-container-blocked">
            <label>{{__('Текст на английском')}}<span class="required">*</span></label>
            <div class="simditor_container">
               <textarea class="simditor-wysiwyg" name="enText" rows="8" required>{{ $news->enText }}</textarea>
            </div>
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

            <form action="/remove_news" method="POST">
               {{ csrf_field() }}
               <input type="hidden" value="{{$news->id}}" name="id"/>
               <button type="submit" class="main-btn delete-btn">{{__('Удалить')}}</button>
            </form>
         </div>
      </div>
   </div>
</div>
<!-- Delete Modal end-->

{{-- Delete news video form --}}
@if($news->video != '')
   <form action="/news/remove_video" method="POST" class="visually-hidden" id="delete_news_video">
      @csrf
      <input type="hidden" name="id" value="{{$news->id}}">
      <button type="submit"></button>
   </form>
@endif

@endsection