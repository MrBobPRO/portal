
@extends('templates.master')
@section('content')

@include('templates.breadcrumbs')

   <section class="complaints-create-page formed-page">

      @if($flash = session('flash'))
      <div class="form-flashed">
        {{ $flash }}
      </div>
      @endif

      <form action="/complaints/store" method="POST" enctype="multipart/form-data">
         @csrf

         <div class="input-container-inline">
            <label>Заголовок</label>
            <input type="text" name="title" required>
         </div>

         <div class="input-container-inline">
            <label>Текст</label>
            <textarea name="text" rows="5" required></textarea>
        </div>

        <div class="input-container-inline">
            <label>Прикрепить файл (при необходимости)</label>
            <input type="file" name="file">
         </div>

         <button class="main-btn" type="submit">Отправить <span class="material-icons-outlined inner-right-icon">arrow_forward</span></button>

      </form>
   </section>

@endsection