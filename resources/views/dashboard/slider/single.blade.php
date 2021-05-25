@extends('dashboard.templates.no_sidebar_master')

@section('content')

   <section class="news-single-page formed-page">
      <form action="/update_slider_item" method="POST" enctype="multipart/form-data">

         <input type="hidden" name="id" value="{{$item->id}}">

         @csrf
         <div class="input-container-inline">
            <label>Приоритет</label>
            <input type="number" name="priority" value="{{ $item->priority }}" required>
         </div>

         <div class="input-container-inline">
            <label>Текст</label>
            <input type="text" name="title" value="{{ $item->title }}" required>
         </div>

         <div class="input-container-inline">
            <label>Ссылка</label>
            <input type="text" name="url" value="{{ $item->url }}" required>
         </div>

         <div class="input-container-inline">
            <label>Цвет</label>
            <input type="color" name="color" value="{{ $item->color }}" required>
         </div>

         <div class="input-container-inline">
            <label>Картинка</label>
            <input type="file" name="image" accept=".jpg, .png, .jpeg">
            <img class="form-image" src="{{asset('img/slider/' . $item->image)}}">
         </div>

         <button class="main-btn" type="submit"><span class="material-icons-outlined">edit</span> Сохранить изменения</button>
     </form>
   </section>

@endsection