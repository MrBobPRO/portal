@extends('dashboard.templates.no_sidebar_master')

@section('content')

   <section class="news-single-page formed-page">
      <form action="/update_projects" method="POST" enctype="multipart/form-data">

         <input type="hidden" name="id" value="{{$project->id}}">

         @csrf
         <div class="input-container-blocked">
             <label>Заголовок на русском</label>
             <input type="text" name="ruTitle" value="{{ $project->ruTitle }}" required>
         </div>

         <div class="input-container-blocked">
               <label>Заголовок на таджикском</label>
               <input type="text" name="tjTitle" value="{{ $project->tjTitle }}" required>
         </div>

         <div class="input-container-blocked">
               <label>Заголовок на английском</label>
               <input type="text" name="enTitle" value="{{ $project->enTitle }}" required>
         </div>

         <div class="input-container-blocked">
            <label>Статус</label>
            <div class="select2_single_container">
               <select class="select2_single" name="completed" required data-dropdown-css-class="select2_single_dropdown">
                  <option value="1" {{$project->completed ? 'selected' : ''}}>Выполненный проект</option>
                  <option value="0" {{$project->completed ? '' : 'selected'}}>Действующий проект</option>
               </select>
            </div>
         </div>

         <div class="input-container-blocked">
            <label>Картинка</label>
            <input type="file" name="image" accept="image/*">
            <img class="form-image" src="{{asset('img/projects/' . $project->image)}}">
         </div>

         <div class="input-container-blocked">
            <label>Текст на русском</label>
            <div class="simditor_container">
               <textarea class="simditor-wysiwyg" name="ruText" rows="8" required>{{ $project->ruText }}</textarea>
            </div>
         </div>

         <div class="input-container-blocked">
            <label>Текст на таджикском</label>
            <div class="simditor_container">
               <textarea class="simditor-wysiwyg" name="tjText" rows="8" required>{{ $project->tjText }}</textarea>
            </div>
         </div>

         <div class="input-container-blocked">
            <label>Текст на английском</label>
            <div class="simditor_container">
               <textarea class="simditor-wysiwyg" name="enText" rows="8" required>{{ $project->enText }}</textarea>
            </div>
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

            <form action="/remove_projects" method="POST">
               {{ csrf_field() }}
               <input type="hidden" value="{{$project->id}}" name="id"/>
               <button type="submit" class="main-btn delete-btn">Удалить</button>
            </form>
         </div>
      </div>
   </div>
</div>
<!-- Delete Modal end-->


@endsection