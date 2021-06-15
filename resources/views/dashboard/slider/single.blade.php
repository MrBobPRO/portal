@extends('dashboard.templates.no_sidebar_master')

@section('content')

   <section class="slider-single-page formed-page">
      <form action="/update_slider_item" method="POST" enctype="multipart/form-data">

         <input type="hidden" name="id" value="{{$item->id}}">

         @csrf
         <div class="input-container-inline">
            <label>{{__('Приоритет')}}<span class="required">*</span></label>
            <input type="number" name="priority" value="{{ $item->priority }}" required>
         </div>

         <div class="input-container-inline">
            <label>{{__('Текст')}}</label>
            <input type="text" name="title" value="{{ __($item->title) }}">
         </div>

         <div class="input-container-inline">
            <label>{{__('Цвет текста')}}<span class="required">*</span></label>
            <input class="color-picker" type="color" name="color" value="{{ $item->color }}" required>
         </div>

         <div class="input-container-inline">
            <label>{{__('Ссылка')}}</label>
            <input type="text" name="url" value="{{ $item->url }}">
         </div>

         <div class="input-container-inline">
            <label>{{__('Картинка')}}. {{__('Рекомендуемый размер картинки')}}: 960x450</label>
            <input type="file" name="image" accept="image/*">
            <img class="form-image" src="{{asset('img/slider/' . $item->image)}}">
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

            <form action="/remove_slider_item" method="POST">
               {{ csrf_field() }}
               <input type="hidden" value="{{$item->id}}" name="id"/>
               <button type="submit" class="main-btn delete-btn">{{__('Удалить')}}</button>
            </form>
         </div>
      </div>
   </div>
</div>
<!-- Delete Modal end-->

@endsection