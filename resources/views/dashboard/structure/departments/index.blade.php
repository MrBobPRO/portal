@extends('dashboard.templates.no_sidebar_master')
@section('content')

<section class="department-index-page">

   <a class="add-button" data-bs-toggle="modal" data-bs-target="#storeModal"><span class="material-icons-outlined">add</span></a>

   <div class="primary-list-titles">
      <div class="width-33">Отделы</div>
      <div class="width-33">Приоритет</div>
      <div class="width-33">Редактирование</div>
   </div>

   <div class="primary-list">
      @foreach($departments as $department)
         <a class="primary-list-item @if($department->id == 1) visually-hidden @endif">
            <div class="width-33">{{$department->name}}</div>
            <div class="width-33">{{$department->priority}}</div>
            <div class="width-33">
               <div class="btns-edit-container">
                  <button class="main-btn" data-bs-toggle="modal" data-bs-target="#updateModal{{$department->id}}">
                     <span class="material-icons-outlined">edit</span> Изменить
                  </button>
                  <button class="main-btn delete-btn" data-bs-toggle="modal" data-bs-target="#deleteModal{{$department->id}}">
                     <span class="material-icons-outlined">delete</span> Удалить
                  </button>
               </div>
            </div>
         </a>

         <!-- Update Modal start-->
         <div class="modal fade edit-modals" id="updateModal{{$department->id}}" tabindex="-1" aria-labelledby="updateModal{{$department->id}}" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
               <div class="modal-content">

                  <div class="modal-header">
                     <h5 class="modal-title">Изменить</h5>
                     <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>

                  <form class="form" action="/departments_update" method="POST">
                     <div class="modal-body">
                        {{ csrf_field() }}
                        <input type="hidden" value="{{ $department->id }}" name="id"/>
                        <label>Отдел
                           <input type="text" value="{{ $department->name }}" name="name" required>
                        </label>
                        <label>Приоритет
                           <input type="number" value="{{ $department->priority }}" name="priority" required>
                        </label>
                     </div>

                     <div class="modal-footer">
                        <button type="submit" class="main-btn update-btn">Изменить</button>
                        <button type="button" class="main-btn cancel-btn" data-bs-dismiss="modal">Отмена</button>
                     </div>
                  </form>

               </div>
            </div>
         </div><!-- Update Modal end-->

         <!-- Delete Modal start-->
         <div class="modal fade" id="deleteModal{{$department->id}}" tabindex="-1" aria-labelledby="deleteModal{{$department->id}}" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
               <div class="modal-content">

                  <div class="modal-header">
                     <h5 class="modal-title">Удалить</h5>
                     <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>

                  <div class="modal-body">
                     Вы уверены что хотите удалить?
                  </div>

                  <form action="/departments_remove" method="POST">
                     <div class="modal-footer">
                        {{ csrf_field() }}
                        <input type="hidden" value="{{ $department->id }}" name="id"/>
                        <button type="submit" class="main-btn delete-btn">Удалить</button>
                        <button type="button" class="main-btn cancel-btn" data-bs-dismiss="modal">Отмена</button>
                     </div>
                  </form>

               </div>
            </div>
         </div><!-- Delete Modal end-->

      @endforeach
   </div>


   <!-- Store Modal start-->
   <div class="modal fade edit-modals" id="storeModal" tabindex="-1" aria-labelledby="storeModal" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
         <div class="modal-content">

            <div class="modal-header">
               <h5 class="modal-title">Добавить</h5>
               <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <form class="form" action="/departments_store" method="POST">
               <div class="modal-body">
                  {{ csrf_field() }}
                  <label>Отдел
                     <input type="text" name="name" required>
                  </label>
                  <label>Приоритет
                     <input type="number" name="priority" required>
                  </label>
               </div>

               <div class="modal-footer">
                  <button type="submit" class="main-btn">Добавить</button>
                  <button type="button" class="main-btn cancel-btn" data-bs-dismiss="modal">Отмена</button>
               </div>
            </form>

         </div>
      </div>
   </div><!-- Store Modal end-->


</section>

@endsection