@extends('templates.no_sidebar_master')
@section('content')

@include('templates.breadcrumbs')

   <section class="structure-page">

      {{-- Dropdown links start --}}
      <div class="dropdown navbar-dropdown">
         <a class="btn btn-secondary dropdown-toggle" href="{{route('structure.index')}}" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
           {{__('Структура')}}
         </a>
       
         <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
           <li><a class="dropdown-item" href="{{route('home.index')}}">{{__('Главная')}}</a></li>
           <li><a class="dropdown-item" href="{{route('knowledge.index')}}">{{__('Центр знаний')}}</a></li>
           <li><a class="dropdown-item" href="{{route('news.index')}}">{{__('Новости')}}</a></li>
           <li><a class="dropdown-item" href="{{route('projects.index')}}">{{__('Проекты и инициативы')}}</a></li>
           <li><a class="dropdown-item" href="{{route('entertainment.index')}}">{{__('Развлечения')}}</a></li>
         </ul>
      </div>{{-- Dropdown links start --}}

      {{-- Department list start --}}
      <div class="departments-list">
         @foreach ($departments as $department)

            <?php 
               $users = DB::table('users')
               ->where('users.department_id', $department->id)
               ->join('designations', 'users.designation_id', '=', 'designations.id')
               ->join('positions', 'users.position_id', '=', 'positions.id')
               ->select('users.*', 'designations.*', 'positions.*', 'users.name as userName', 'users.id as userId', 'designations.name as designationName', 'positions.name as positionName')
               ->orderBy('designations.priority', 'asc')
               ->get();
            ?>

            {{-- Used to hide departments without users --}}
            @if(count($users) > 0)
               <div class="departments-list-item">
                  <h2><span class="material-icons-outlined">arrow_right</span> {{__($department->name)}}</h2>
                  {{-- Users list item start --}}
                  <div class="users-list">

                     @foreach ($users as $u)
                        <a href="{{route('dashboard.users.single', $u->userId)}}" class="users-list-item">
                           <img src="{{ asset('img/users/' . $u->avatar) }}">
                           <div>
                              <h6>{{$u->userName . ' ' . $u->surname}}</h6>
                              <p>{{__($u->designationName)}}</p>
                              <span>{{__($u->positionName)}}</span>
                           </div>
                        </a>
                     @endforeach
                  </div> {{-- Users list end start --}}
               </div> 
            @endif
         @endforeach
      </div> {{-- Department list end start --}}

   </section>

@endsection