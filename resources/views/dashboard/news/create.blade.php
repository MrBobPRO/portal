@extends('dashboard.templates.no_sidebar_master')

@section('content')

   <section class="news-single-page formed-page">
      <form action="/store_news" method="POST" enctype="multipart/form-data">

         @csrf
         <div class="input-container-blocked">
             <label>{{__('Заголовок на русском')}}<span class="required">*</span></label>
             <input type="text" name="ruTitle" required>
         </div>

         <div class="input-container-blocked">
               <label>{{__('Заголовок на таджикском')}}<span class="required">*</span></label>
               <input type="text" name="tjTitle" required>
         </div>

         <div class="input-container-blocked">
               <label>{{__('Заголовок на английском')}}<span class="required">*</span></label>
               <input type="text" name="enTitle" required>
         </div>

         <div class="input-container-blocked">
            <label>{{__('Тип')}}<span class="required">*</span></label>
            <div class="select2_single_container">
               <select class="select2_single" name="global" required data-dropdown-css-class="select2_single_dropdown">
                  <option value="1">{{__('Мировые новости')}}</option>
                  <option value="0">{{__('Новости компании')}}</option>
               </select>
            </div>
         </div>

         <div class="input-container-blocked">
            <label>{{__('Картинка')}}<span class="required">*</span></label>
            <input type="file" name="image" accept="image/*" required>
         </div>

         <div class="input-container-blocked">
            <label>{{__('Видео')}}. {{__('Поддерживаемые форматы')}} (mp4, webm, ogg)</label>
            <input type="file" name="video" id="file" accept=".mp4, .webm, .ogg">
         </div>

         <div class="input-container-blocked">
            <label>{{__('Текст на русском')}}<span class="required">*</span></label>
            <div class="simditor_container">
               <textarea class="simditor-wysiwyg" name="ruText" rows="8" required></textarea>
            </div>
         </div>

         <div class="input-container-blocked">
            <label>{{__('Текст на таджикском')}}<span class="required">*</span></label>
            <div class="simditor_container">
               <textarea class="simditor-wysiwyg" name="tjText" rows="8" required></textarea>
            </div>
         </div>

         <div class="input-container-blocked">
            <label>{{__('Текст на английском')}}<span class="required">*</span></label>
            <div class="simditor_container">
               <textarea class="simditor-wysiwyg" name="enText" rows="8" required></textarea>
            </div>
         </div>

         <button class="main-btn" type="submit"><span class="material-icons-outlined">add</span> {{__('Добавить')}}</button>
     </form>
   </section>

@endsection