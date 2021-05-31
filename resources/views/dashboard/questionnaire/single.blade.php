@extends('dashboard.templates.no_sidebar_master')

@section('content')

   <section class="questionnaire-single-page formed-page">
      <form action="/update_questionnaire" method="POST" enctype="multipart/form-data">

         <input type="hidden" name="id" value="{{$question->id}}">

         @csrf
         <div class="input-container-inline">
            <label>Текст</label>
            <textarea name="text" rows="5" required>{{ $question->text }}</textarea>
         </div>

         <div class="input-container-inline">
            <label>Приватность</label>

            <div class="checkbox-container">
               <input type="checkbox" id="private" name="private" value="1" {{$question->private ? 'checked' : ''}}>
               <label class="no-selection" for="private">Приватный опрос</label>
            </div>
         </div>

         <div class="spaced-btw-btns">
            <button class="main-btn delete-btn" type="button" data-bs-toggle="modal" data-bs-target="#deleteModal"><span class="material-icons-outlined">delete</span> Удалить</button>
            <button class="main-btn" type="submit"><span class="material-icons-outlined">edit</span> Сохранить изменения</button>
         </div>

     </form>

     <div class="variants-list">
         <h2 class="title-seperator">Варианты</h2>

         <form action="/store_options" method="POST" class="store-form">
            @csrf
            <input type="hidden" value="{{$question->id}}" name="question_id">
            <input name="text" type="text" placeholder="Добавить новый вариант" required>

            <button class="main-btn" type="submit">Добавить</button>
         </form>

         @foreach ($question->options as $opt)
            <div class="single-variant">
               <form action="/update_options" method="POST" class="update-form">
                  @csrf
                  <input type="hidden" value="{{$opt->id}}" name="id">
                  <input name="text" required value="{{ $opt->text }}">
   
                  <button class="main-btn" type="submit">Изменить</button>
               </form>

               <form action="/remove_options" method="POST" class="delete-form">
                  @csrf
                  <input type="hidden" value="{{$opt->id}}" name="id">
                  <button class="main-btn delete-btn" type="submit">Удалить</button>
               </form>
            </div>

         @endforeach
     </div>


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

            <form action="/remove_questionnaire" method="POST">
               {{ csrf_field() }}
               <input type="hidden" value="{{$question->id}}" name="id"/>
               <button type="submit" class="main-btn delete-btn">Удалить</button>
            </form>
         </div>
      </div>
   </div>
</div>
<!-- Delete Modal end-->
   
@endsection