@extends('dashboard.templates.no_sidebar_master')

@section('content')

   <section class="news-single-page formed-page">
      <form action="/store_projects" method="POST" enctype="multipart/form-data">

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
            <label>{{__('Статус')}}<span class="required">*</span></label>
            <div class="select2_single_container">
               <select class="select2_single" name="completed" required data-dropdown-css-class="select2_single_dropdown">
                  <option value="1">{{__('Выполненный проект')}}</option>
                  <option value="0">{{__('Действующий проект')}}</option>
               </select>
            </div>
         </div>

         <div class="input-container-blocked">
            <label>{{__('Менеджер проекта')}}<span class="required">*</span></label>
            <div class="select2_single_container">
               <select 
                  name="manager_id" 
                  class="select2_single" 
                  data-dropdown-css-class="select2_single_dropdown"
                  required
               >
                  @foreach($all_users as $us)
                     <option value="{{ $us->id }}">{{ __($us->name) }} {{ __($us->surname) }} {{ __($us->patronymic) }}</option>   
                  @endforeach
               </select>
            </div>
         </div>

         <div class="input-container-blocked">
            <label>{{__('Картинка')}}<span class="required">*</span></label>
            <input type="file" name="image" accept="image/*" required>
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