
@extends('dashboard.templates.master')

@section('content')

   {{-- include no sidebar and no menu styles --}}
   <link href="{{ asset('css/no_sidebar/styles.css') }}" rel="stylesheet">

   <section class="users-page">
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