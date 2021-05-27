
@extends('templates.no_sidebar_master')
@section('content')

@include('templates.breadcrumbs')

   <section class="ideas-create-page formed-page">

      @if($flash = session('flash'))
         <div class="form-flashed">
            {{ $flash }}
         </div>
      @endif

      <form action="/ideas/store" method="POST" enctype="multipart/form-data">
         @csrf

         <div class="input-container-blocked">
            <label>Заголовок</label>
            <input type="text" name="title" required>
         </div>

         <div class="input-container-blocked">
            <label>Текст</label>
            <textarea class="simditor-wysiwyg" name="text" rows="5" required></textarea>
        </div>

        <div class="input-container-blocked">
            <label>Прикрепить файл (при необходимости)</label>
            <input type="file" name="file">
         </div>

        <button class="main-btn" type="submit">Отправить</button>

      </form>
   </section>

@endsection