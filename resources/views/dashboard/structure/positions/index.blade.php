@extends('dashboard.templates.no_sidebar_master')
@section('content')

<section class="positions-index-page">

   <div class="primary-list-titles">
      <div class="width-33">Должности</div>
      <div class="width-33">Отделы</div>
      <div class="width-33">Дата добавления</div>
   </div>

   <div class="primary-list">
      @foreach($positions as $position)
         <div class="primary-items">
            <a class="primary-list-item">
               <div class="width-33">{{$position->name}}</div>
               <div class="width-33">{{ App\Models\Department::find($position->department_id)->name }}</div>
               <div class="width-33">
                  <?php 
                     $date = \Carbon\Carbon::parse($position->created_at)->locale('ru');
                     $formatted = $date->isoFormat('DD MMMM YYYY H:mm:s');
                  ?>
                  {{$formatted}}
               </div>
            </a>
            <div class="buttons">
               <button class="main-btn update-btn" type="button" data-bs-toggle="modal" data-bs-target="#updateModal{{$position->id}}"><span class="material-icons-outlined">edit</span> Изменить</button>
               <button class="main-btn delete-btn" type="button" data-bs-toggle="modal" data-bs-target="#deleteModal{{$position->id}}"><span class="material-icons-outlined">delete</span> Удалить</button>
               <div class="dash-search-container">
                  <a class="add-button" type="button" data-bs-toggle="modal" data-bs-target="#storeModal{{$position->id}}"><span class="material-icons-outlined">add</span></a>
               </div>
            </div>
            <!-- Update Modal start-->
            <div class="modal fade" id="updateModal{{$position->id}}" tabindex="-1" aria-labelledby="updateModal{{$position->id}}" aria-hidden="true">
               <div class="modal-dialog">
                  <div class="modal-content">
                     <div class="modal-header">
                        <h5 class="modal-title">Изменить</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                     </div>
                     <div class="modal-footer">
                        <form class="form" action="/positions_update" method="POST">
                           {{ csrf_field() }}
                           <input type="hidden" value="{{ $position->id }}" name="id"/>
                           <label>Должность
                              <input type="text" value="{{ $position->name }}" name="name"/>
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
            <div class="modal fade" id="deleteModal{{$position->id}}" tabindex="-1" aria-labelledby="deleteModal{{$position->id}}" aria-hidden="true">
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

                        <form action="/positions_remove" method="POST">
                           {{ csrf_field() }}
                           <input type="hidden" value="{{ $position->id }}" name="id"/>
                           <button type="submit" class="main-btn delete-btn">Удалить</button>
                        </form>
                     </div>
                  </div>
               </div>
            </div><!-- Delete Modal end-->
            <!-- Store Modal start-->
            <div class="modal fade" id="storeModal{{$position->id}}" tabindex="-1" aria-labelledby="storeModal{{$position->id}}" aria-hidden="true">
               <div class="modal-dialog">
                  <div class="modal-content">
                     <div class="modal-header">
                        <h5 class="modal-title">Добавить</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                     </div>
                     <div class="modal-footer">
                        <form class="form" action="/positions_store" method="POST">
                           {{ csrf_field() }}
                           <label>Должность
                              <input type="text" name="name"/>
                           </label>
                           <label>Отделы
                              {{-- Department start --}}
                              <div class="select2_single_container">
                                 <select name="department_id" class="select2_single" data-dropdown-css-class="select2_single_dropdown">
                                    @foreach($departments as $department)
                                       <option value="{{ $department->id }}">{{ $department->name }}</option>   
                                    @endforeach
                                 </select>
                              </div>
                              {{-- Department end --}}
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