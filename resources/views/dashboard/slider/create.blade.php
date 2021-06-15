@extends('dashboard.templates.no_sidebar_master')

@section('content')

   <section class="slider-page formed-page">
      <form action="/store_slider_item" method="POST" enctype="multipart/form-data">

         @csrf
         <div class="input-container-inline">
            <label>{{__('Приоритет')}}<span class="required">*</span></label>
            <input type="number" name="priority" required>
         </div>

         <div class="input-container-inline">
            <label>{{__('Текст')}}</label>
            <input type="text" name="title">
         </div>

         <div class="input-container-inline">
            <label>{{__('Цвет текста')}}<span class="required">*</span></label>
            <input class="color-picker" type="color" name="color" required>
         </div>

         <div class="input-container-inline">
            <label>{{__('Ссылка')}}</label>
            <input type="text" name="url">
         </div>

         <div class="input-container-inline">
            <label>{{__('Картинка')}}. {{__('Рекомендуемый размер картинки')}}: 960x450</label>
            <input type="file" name="image" accept="image/*">
         </div>

         <button class="main-btn" type="submit"><span class="material-icons-outlined">edit</span> {{__('Добавить')}}</button>
     </form>
   </section>

@endsection