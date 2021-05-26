@extends('dashboard.templates.no_sidebar_master')

@section('content')

   <section class="slider-single-page formed-page">
      <form action="/update_slider_item" method="POST" enctype="multipart/form-data">

         <input type="hidden" name="id" value="{{$item->id}}">

         @csrf
         <div class="input-container-inline">
            <label>Приоритет</label>
            <input type="number" name="priority" value="{{ $item->priority }}" required>
         </div>

         <div class="input-container-inline">
            <label>Текст</label>
            <input type="text" name="title" value="{{ $item->title }}">
         </div>

         <div class="input-container-inline">
            <label>Цвет текста</label>
            <input class="color-picker" type="color" name="color" value="{{ $item->color }}" required>
         </div>

         <div class="input-container-inline">
            <label>Ссылка</label>
            <input type="text" name="url" value="{{ $item->url }}">
         </div>

         <div class="input-container-inline">
            <label>Картинка</label>
            <input type="file" name="image" accept="image/*">
            <img class="form-image" src="{{asset('img/slider/' . $item->image)}}">
         </div>

         <button class="main-btn" type="submit"><span class="material-icons-outlined">edit</span> Сохранить изменения</button>
     </form>
   </section>

@endsection