@extends('dashboard.templates.no_sidebar_master')

@section('content')

<section class="knowledge-page formed-page">

   <form action="/knowledge_books_update" method="POST" enctype="multipart/form-data">
      @csrf
      <input type="hidden" name="book_id" value="{{ $book->id }}">
      <div class="input-container-blocked">
         <label>Название книги на русском</label>
         <input type="text" name="ruTitle" value="{{ $book->ruTitle }}" required>

         <label> <br> Название книги на таджикском</label>
         <input type="text" name="tjTitle" value="{{ $book->tjTitle }}" required>

         <label> <br> Название книги на английском</label>
         <input type="text" name="enTitle" value="{{ $book->enTitle }}" required>
      </div>

      <div class="input-container-blocked">
         <label>Изменить файл / <a href="{{ route('knowledge.books.single', $book->id) }}" target="_blank">Посмотреть книгу</a></label>
         <input type="file" name="file" accept=".pdf">
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

            <form action="/knowledge_books_remove" method="POST">
               {{ csrf_field() }}
               <input type="hidden" value="{{$book->id}}" name="id"/>
               <button type="submit" class="main-btn delete-btn">Удалить</button>
            </form>
         </div>
      </div>
   </div>
</div>
<!-- Delete Modal end-->

@endsection