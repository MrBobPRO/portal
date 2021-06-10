@extends('dashboard.templates.no_sidebar_master')
@section('content')

<section class="designation-index-page">

   <a class="add-button" data-bs-toggle="modal" data-bs-target="#storeModal"><span class="material-icons-outlined">add</span></a>

   <div class="primary-list-titles">
      <div class="width-25">Позиции</div>
      <div class="width-25">Приоритет</div>
      <div class="width-25">Количество сотрудников</div>
      <div class="width-25">Редактирование</div>
   </div>

   <div class="primary-list">
      @foreach($designations as $designation)
         <a class="primary-list-item @if($designation->id == 1) visually-hidden @endif">
            <div class="width-25">{{$designation->name}}</div>
            <div class="width-25">{{$designation->priority}}</div>
            <div class="width-25">{{count(App\Models\User::where('department_id', $designation->id)->get())}}</div>
            <div class="width-25">
               <div class="btns-edit-container">
                  <button class="main-btn" data-bs-toggle="modal" data-bs-target="#updateModal{{$designation->id}}">
                     <span class="material-icons-outlined">edit</span> Изменить
                  </button>
                  <button class="main-btn delete-btn" data-bs-toggle="modal" data-bs-target="#deleteModal{{$designation->id}}">
                     <span class="material-icons-outlined">delete</span> Удалить
                  </button>
               </div>
            </div>
         </a>

         <!-- Update Modal start-->
         <div class="modal fade edit-modals" id="updateModal{{$designation->id}}" tabindex="-1" aria-labelledby="updateModal{{$designation->id}}" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
               <div class="modal-content">

                  <div class="modal-header">
                     <h5 class="modal-title">Изменить</h5>
                     <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>

                  <form class="form" action="/update_designations" method="POST">
                     <div class="modal-body">
                        {{ csrf_field() }}
                        <input type="hidden" value="{{ $designation->id }}" name="id"/>
                        <label>Позиция
                           <input type="text" value="{{ $designation->name }}" name="name" required>
                        </label>
                        <label>Приоритет
                           <input type="number" value="{{ $designation->priority }}" name="priority" required>
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
         <div class="modal fade" id="deleteModal{{$designation->id}}" tabindex="-1" aria-labelledby="deleteModal{{$designation->id}}" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
               <div class="modal-content">

                  <div class="modal-header">
                     <h5 class="modal-title">Удалить</h5>
                     <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>

                  <div class="modal-body">
                     Вы уверены что хотите удалить?
                  </div>

                  <form action="/remove_designations" method="POST">
                     <div class="modal-footer">
                        {{ csrf_field() }}
                        <input type="hidden" value="{{ $designation->id }}" name="id"/>
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

            <form class="form" action="/store_designations" method="POST">
               <div class="modal-body">
                  {{ csrf_field() }}
                  <label>Позиция
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