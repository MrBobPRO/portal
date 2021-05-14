@extends('dashboard.templates.no_sidebar_master')

@section('content')

   <section class="news-single-page formed-page">
      <form action="/update_news" method="POST" enctype="multipart/form-data">
         @csrf
         <div class="input-container-inline">
             <label>Заголовок</label>
             <input type="text" name="name" value="{{ $news->ruTitle }}" required>
         </div>

         <div class="input-container-inline">
            <label>Текст</label>
            <div class="simditor_container">
               <textarea class="simditor-wysiwyg" name="text" rows="8" required>{{ $news->ruText }}</textarea>
            </div>
         </div>

         <div class="input-container-inline">
            <label>Тип</label>
            <div class="select2_single_container">
               <select class="select2_single" required
               data-dropdown-css-class="select2_single_dropdown">
                  <option value="1" {{$news->global ? 'selected' : ''}}>Мировые новости</option>
                  <option value="0" {{$news->global ? '' : 'selected'}}>Новости компании</option>
               </select>
            </div>
         </div>

         <div class="input-container-inline">
            <label>Фото</label>
            <input type="file" name="image" accept=".jpg, .png, .jpeg">
         </div>

         <button class="main-btn" type="submit"><span class="material-icons-outlined">edit</span> Сохранить изменения</button>
     </form>  {{-- Personal data form end --}}
   </section>

@endsection