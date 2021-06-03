
@extends('templates.master')
@section('content')

   <section class="search-page">

      @if (count($result->news))
         <h1>Новости</h1>
         @foreach ($result->news as $new)
            <a href="{{ route('news.single', $new->id)}}">{{$new->ruTitle}}</a>
         @endforeach
      @endif

      @if (count($result->users))
         <h1>Пользователи</h1>
         @foreach ($result->users as $us)
            <a href="{{ route('dashboard.users.single', $us->id)}}">{{$us->name . ' ' . $us->surname}}</a>
         @endforeach
      @endif

   </section>
   
@endsection