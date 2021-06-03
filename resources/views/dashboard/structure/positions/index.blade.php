@extends('dashboard.templates.no_sidebar_master')
@section('content')

<section class="positions-index-page">

   <a class="add-button" data-bs-toggle="modal" data-bs-target="#storeModal"><span class="material-icons-outlined">add</span></a>


   <div class="primary-list-titles">
      <div class="width-33">Должности</div>
      <div class="width-33">Отделы</div>
      <div class="width-33">Редактирование</div>
   </div>

   <div class="primary-list">
      @foreach($positions as $position)
         <div class="primary-items">
            <a class="primary-list-item">
               <div class="width-33">{{$position->name}}</div>
               <div class="width-33">{{ App\Models\Department::find($position->department_id)->name }}</div>
               <div class="width-33">
                  <div class="btns-edit-container">
                     <button class="main-btn" data-bs-toggle="modal" data-bs-target="#updateModal{{$position->id}}">
                        <span class="material-icons-outlined">edit</span> Изменить
                     </button>
                     <button class="main-btn delete-btn" data-bs-toggle="modal" data-bs-target="#deleteModal{{$position->id}}">
                        <span class="material-icons-outlined">delete</span> Удалить
                     </button>
                  </div>
               </div>
            </a>

            <!-- Update Modal start-->
            <div class="modal fade edit-modals" id="updateModal{{$position->id}}" tabindex="-1" aria-labelledby="updateModal{{$position->id}}" aria-hidden="true">
               <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                  <div class="modal-content">

                     <div class="modal-header">
                        <h5 class="modal-title">Изменить</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                     </div>

                     <form class="form" action="/positions_update" method="POST">
                        <div class="modal-body">
                           {{ csrf_field() }}
                           <input type="hidden" value="{{ $position->id }}" name="id"/>
                           <label>Должность
                              <input type="text" value="{{ $position->name }}" name="name" required>
                           </label>
                           <label>Отделы
                              {{-- Department start --}}
                              <div class="select2_single_container">
                                 <select name="department_id" class="select2_single" data-dropdown-css-class="select2_single_dropdown">
                                    @foreach($departments as $department)
                                       <option value="{{ $department->id }}" {{$position->department_id == $department->id ? 'selected' : ''}}>{{ $department->name }}</option>   
                                    @endforeach
                                 </select>
                              </div>
                              {{-- Department end --}}
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
            <div class="modal fade" id="deleteModal{{$position->id}}" tabindex="-1" aria-labelledby="deleteModal{{$position->id}}" aria-hidden="true">
               <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                  <div class="modal-content">

                     <div class="modal-header">
                        <h5 class="modal-title">Удалить</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                     </div>

                     <div class="modal-body">
                        Вы уверены что хотите удалить?
                     </div>

                     <form action="/positions_remove" method="POST">
                        <div class="modal-footer">
                           {{ csrf_field() }}
                           <input type="hidden" value="{{ $position->id }}" name="id"/>
                           <button type="submit" class="main-btn delete-btn">Удалить</button>
                           <button type="button" class="main-btn cancel-btn" data-bs-dismiss="modal">Отмена</button>
                        </div>
                     </form>

                  </div>
               </div>
            </div><!-- Delete Modal end-->

         </div>
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

            <form class="form" action="/positions_store" method="POST">
               <div class="modal-body">
                  {{ csrf_field() }}
                  <label>Должность
                     <input type="text" name="name" required>
                  </label>
                  <label>Отдел
                     {{-- Department start --}}
                     <div class="select2_single_container">
                        <select name="department_id" class="select2_single" data-dropdown-css-class="select2_single_dropdown">
                           <option>Отдел</option>
                           @foreach($departments as $department)
                              <option value="{{ $department->id }}">{{ $department->name }}</option>   
                           @endforeach
                        </select>
                     </div>
                     {{-- Department end --}}
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