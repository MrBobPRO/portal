@extends('templates.master')
@section('content')

@include('templates.breadcrumbs')

{{-- Hide sidebar and main menu --}}
<style>
   main {
      padding-top: 0px;
   }
   .sidebar {
      display: none;
   }
   .content {
      width: 100%;
   }
   .main-nav {
      display: none
   }
</style>

   <section class="structure-page">
      {{-- Department list start --}}
      <div class="departments-list">
         @foreach ($departments as $department)
            <div class="departments-list-item">
               <h2><span class="material-icons-outlined">double_arrow</span> {{$department->name}}</h2>
               {{-- Users list item start --}}
               <div class="users-list">
                  
                  <?php 
                     $users = DB::table('users')
                     ->where('users.department_id', $department->id)
                     ->join('designations', 'users.designation_id', '=', 'designations.id')
                     ->join('positions', 'users.position_id', '=', 'positions.id')
                     ->select('users.*', 'designations.*', 'positions.*', 'users.name as userName', 'designations.name as designationName', 'positions.name as positionName')
                     ->orderBy('designations.priority', 'asc')
                     ->get();
                  ?>

                  @foreach ($users as $u)
                     <a href="#" class="users-list-item">
                        <img src="{{ asset('img/users/' . $u->avatar) }}">
                        <div>
                           <h6>{{$u->userName . ' ' . $u->surname}}</h6>
                           <p>{{$u->designationName}}</p>
                           <span>{{$u->positionName}}</span>
                        </div>
                     </a>
                  @endforeach
               </div> {{-- Users list end start --}}
            </div> 
         @endforeach
      </div> {{-- Department list end start --}}

   </section>

@endsection