@extends('dashboard.templates.no_sidebar_master')

@section('content')

   <section class="ads-page formed-page">
      <form action="/store_ads" method="POST" enctype="multipart/form-data">

         @csrf
         <div class="input-container-inline">
            <label>Текст<span class="required">*</span></label>
            <textarea name="text" rows="5" required></textarea>
         </div>

         <button class="main-btn" type="submit"><span class="material-icons-outlined">edit</span> Добавить</button>
     </form>
   </section>

@endsection