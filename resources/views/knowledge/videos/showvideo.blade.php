@extends('templates.master')
@section('content')

   <section class="videos-page">
      <ul>
         
            <li> {{ $video->category }} </li>

      </ul>
   </section>

@endsection