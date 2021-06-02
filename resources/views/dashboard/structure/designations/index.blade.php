@extends('dashboard.templates.no_sidebar_master')
@section('content')

<section class="designation-index-page">

   <div class="primary-list-titles">
      <div class="width-33">Позиции</div>
      <div class="width-33">Приоритет</div>
      <div class="width-33">Дата добавления</div>
   </div>

   <div class="primary-list">
      @foreach($designations as $designation)
         <div class="primary-items">
            <a class="primary-list-item">
               <div class="width-33">{{$designation->name}}</div>
               <div class="width-33">{{$designation->priority}}</div>
               <div class="width-33">
                  <?php 
                     $date = \Carbon\Carbon::parse($designation->created_at)->locale('ru');
                     $formatted = $date->isoFormat('DD MMMM YYYY H:mm:s');
                  ?>
                  {{$formatted}}
               </div>
            </a>
            <div class="buttons">
               <button class="main-btn update-btn" type="button" data-bs-toggle="modal" data-bs-target="#updateModal{{$designation->id}}"><span class="material-icons-outlined">edit</span> Изменить</button>
               <button class="main-btn delete-btn" type="button" data-bs-toggle="modal" data-bs-target="#deleteModal{{$designation->id}}"><span class="material-icons-outlined">delete</span> Удалить</button>
               <div class="dash-search-container">
                  <a class="add-button" type="button" data-bs-toggle="modal" data-bs-target="#storeModal{{$designation->id}}"><span class="material-icons-outlined">add</span></a>
               </div>
            </div>
            <!-- Update Modal start-->
            <div class="modal fade" id="updateModal{{$designation->id}}" tabindex="-1" aria-labelledby="updateModal{{$designation->id}}" aria-hidden="true">
               <div class="modal-dialog">
                  <div class="modal-content">
                     <div class="modal-header">
                        <h5 class="modal-title">Изменить</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                     </div>
                     <div class="modal-footer">
                        <form class="form" action="/designations_update" method="POST">
                           {{ csrf_field() }}
                           <input type="hidden" value="{{ $designation->id }}" name="id"/>
                           <label>Отдел
                              <input type="text" value="{{ $designation->name }}" name="name" required>
                           </label>
                           <label>Приоритет
                              <input type="number" value="{{ $designation->priority }}" name="priority"/>
                           </label>
                           <div class="d-btn">
                              <button type="submit" class="main-btn update-btn">Изменить</button>
                              <button type="button" class="main-btn" data-bs-dismiss="modal">Отмена</button>
                           </div>
                        </form>
                     </div>
                  </div>
               </div>
            </div><!-- Update Modal end-->
            <!-- Delete Modal start-->
            <div class="modal fade" id="deleteModal{{$designation->id}}" tabindex="-1" aria-labelledby="deleteModal{{$designation->id}}" aria-hidden="true">
               <div class="modal-dialog">
                  <div class="modal-content">
                     <div class="modal-header">
                        <h5 class="modal-title">Удалить</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                     </div>
                     <div class="modal-body">
                        Вы уверены что хотите удалить?
                     </div>
                     <div class="modal-footer">
                        <button type="button" class="main-btn" data-bs-dismiss="modal">Отмена</button>

                        <form action="/designations_remove" method="POST">
                           {{ csrf_field() }}
                           <input type="hidden" value="{{ $designation->id }}" name="id" required>
                           <button type="submit" class="main-btn delete-btn">Удалить</button>
                        </form>
                     </div>
                  </div>
               </div>
            </div><!-- Delete Modal end-->
            <!-- Store Modal start-->
            <div class="modal fade" id="storeModal{{$designation->id}}" tabindex="-1" aria-labelledby="storeModal{{$designation->id}}" aria-hidden="true">
               <div class="modal-dialog">
                  <div class="modal-content">
                     <div class="modal-header">
                        <h5 class="modal-title">Добавить</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                     </div>
                     <div class="modal-footer">
                        <form class="form" action="/designations_store" method="POST">
                           {{ csrf_field() }}
                           <label>Позиция
                              <input type="text" name="name" required>
                           </label>
                           <label>Приоритет
                              <input type="number" name="priority">
                           </label>
                           <div class="d-btn">
                              <button type="submit" class="main-btn update-btn">Добавить</button>
                              <button type="button" class="main-btn" data-bs-dismiss="modal">Отмена</button>
                           </div>
                        </form>
                     </div>
                  </div>
               </div>
            </div><!-- Store Modal end-->
         </div>
      @endforeach
   </div>

</section>

@endsection