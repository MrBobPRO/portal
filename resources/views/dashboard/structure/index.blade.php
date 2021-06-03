@extends('dashboard.templates.no_sidebar_master')
@section('content')

   <section class="structure-page">

      <a class="add-button" href="{{route('dashboard.structure.users.create')}}"><span class="material-icons-outlined">person_add_alt</span></a>

      <div class="dash-search-container">
         {{-- Users search start --}}
         <div class="select2_single_container">
            <select class="select2_single select2_single_linked" data-placeholder="Поиск сотрудников..." data-dropdown-css-class="select2_single_dropdown">
               <option></option>
               @foreach($allUsers as $user)
                  <option value="{{ route('dashboard.structure.users.update', $user->id)}}">{{$user->name}} {{$user->surname}}</option>   
               @endforeach
            </select>
         </div>
         {{-- Users search end --}}
         <div class="structure-links">
            <a class="main-btn" href="{{ route('dashboard.structure.departments.index') }}">
               <span class="material-icons-outlined">workspaces</span> Отделы</a>
            <a class="main-btn" href="{{ route('dashboard.structure.designations.index') }}">
               <span class="material-icons-outlined">north_east</span> Позиции</a>
            <a class="main-btn" href="{{ route('dashboard.structure.positions.index') }}">
               <span class="material-icons-outlined">work_outline</span> Должности</a>
         </div>
      </div>
      {{-- Department list start --}}
      <div class="departments-list">
         @foreach ($departments as $department)
            <div class="departments-list-item">
               <h2><span class="material-icons-outlined">arrow_right</span> {{$department->name}}</h2>
               {{-- Users list item start --}}
               <div class="users-list">
                  
                  <?php 
                     $users = DB::table('users')
                     ->where('users.department_id', $department->id)
                     ->join('designations', 'users.designation_id', '=', 'designations.id')
                     ->join('positions', 'users.position_id', '=', 'positions.id')
                     ->select('users.*', 'designations.*', 'positions.*', 'users.name as userName', 'users.id as userId', 'designations.name as designationName', 'positions.name as positionName')
                     ->orderBy('designations.priority', 'asc')
                     ->get();
                  ?>

                  @foreach ($users as $u)
                     <a href="{{route('dashboard.structure.users.update', $u->userId)}}" class="users-list-item">
                        <img src="{{ asset('img/users/' . $u->avatar) }}">
                        <div>
                           <h6>{{$u->userName . ' ' . $u->surname}}</h6>
                           <p>{{$u->designationName}}</p>
                           <span>{{$u->positionName}}</span>
                        </div>
                     </a>
                  @endforeach
               </div> {{-- Users list end --}}
            </div> 
         @endforeach
      </div> {{-- Department list end --}}

   </section>

@endsection