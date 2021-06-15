@extends('dashboard.templates.no_sidebar_master')

@section('content')

<section class="knowledge-page formed-page">

   <form action="/update_books" method="POST" enctype="multipart/form-data">
      @csrf
      <input type="hidden" name="book_id" value="{{ $book->id }}">

      <div class="input-container-blocked">
         <label>{{__('Название книги на русском')}}<span class="required">*</span></label>
         <input type="text" name="ruTitle" required value="{{ $book->ruTitle }}"> 
      </div>

      <div class="input-container-blocked">
         <label>{{__('Название книги на таджикском')}}<span class="required">*</span></label>
         <input type="text" name="tjTitle" required value="{{ $book->tjTitle }}"> 
      </div>

      <div class="input-container-blocked">
         <label>{{__('Название книги на английском')}}<span class="required">*</span></label>
         <input type="text" name="enTitle" required value="{{ $book->enTitle }}">
      </div>

      <div class="input-container-blocked">
         <label>{{__('Изменить файл')}} / <a href="{{ route('knowledge.books.single', $book->id) }}" target="_blank">{{__('Посмотреть книгу')}}</a></label>
         <input type="file" name="file" accept=".pdf">
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

            <form action="/remove_books" method="POST">
               {{ csrf_field() }}
               <input type="hidden" value="{{$book->id}}" name="id"/>
               <button type="submit" class="main-btn delete-btn">{{__('Удалить')}}</button>
            </form>
         </div>
      </div>
   </div>
</div>
<!-- Delete Modal end-->

@endsection