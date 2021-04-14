@extends('templates.master')
@section('content')

   <section class="videos-page">
      <ul>
         
         @foreach ($videos as $video) 
            <li> {{ $video->category }} </li>
         @endforeach

      </ul>
   </section>

@endsection