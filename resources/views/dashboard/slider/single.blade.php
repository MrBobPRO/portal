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

            <form action="/remove_slider_item" method="POST">
               {{ csrf_field() }}
               <input type="hidden" value="{{$item->id}}" name="id"/>
               <button type="submit" class="main-btn delete-btn">Удалить</button>
            </form>
         </div>
      </div>
   </div>
</div>
<!-- Delete Modal end-->

@endsection