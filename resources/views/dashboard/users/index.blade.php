
@extends('dashboard.templates.master')

@section('content')

   {{-- include no sidebar and no menu styles --}}
   <link href="{{ asset('css/no_sidebar/styles.css') }}" rel="stylesheet">

   <section class="users-page">

      {{-- Users seach start --}}
      <div class="select2_single_container users_search_container">
         <select class="select2_single select2_single_linked" data-placeholder="Поиск пользователей..." data-dropdown-css-class="select2_single_dropdown select2_authors_dropdown">
            <option></option>
            @foreach($users as $u)
               <option value="{{ route('dashboard.users.single', $u->id)}}">{{$u->name . ' ' . $u->surname}}</option>   
            @endforeach
         </select>
      </div>
      {{-- Authors seach end --}}


      <div class="users-list">
         @foreach ($users as $u)
            <a href="{{route('dashboard.users.single', $u->id)}}" class="users-list-item">
               <img src="{{ asset('img/users/' . $u->avatar) }}">
               <div>
                  <h6>{{$u->name . ' ' . $u->surname}}</h6>
                  <p>{{$u->designation->name}}</p>
                  <span>{{$u->position->name}}</span>
               </div>
            </a>
         @endforeach
      </div>
   </section>

@endsection