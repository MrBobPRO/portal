@extends('templates.master')
@section('content')

@include('templates.breadcrumbs')

   <section class="videos-single-page">

      <div class="single-video">
         {{-- Custom id used in js --}}
         <video class="plyr" playsinline controls id="player" onplay="pauseInactivePlayers({{$video->id}})" 
            data-poster="/videos/knowledge/posters/{{$video->poster}}">
            <source src="/videos/knowledge/{{$video->filename}}"/>
         
            @if($video->subtitles != '')
               <track kind="captions" label="English" src="/videos/knowledge/subtitles/{{$video->subtitles}}" srclang="en" default />
            @endif
         </video>
         
      </div>

   </section>
   
@endsection
