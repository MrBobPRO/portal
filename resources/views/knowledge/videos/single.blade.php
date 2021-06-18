@extends('templates.master')
@section('content')

@include('templates.breadcrumbs')

   <section class="videos-single-page">

      <div class="single-video">
         {{-- Custom id used in js --}}
         <video class="plyr" playsinline controls id="player0"
            data-poster="/videos/knowledge/posters/{{$video->poster}}">
            @if ($video->from_catalog)
               <source src="/catalog/videos//{{$video->filename}}"/>
            @else
               <source src="/videos/knowledge/{{$video->filename}}"/>
            @endif
            @if($video->subtitles != '')
               <track kind="captions" label="English" src="/videos/knowledge/subtitles/{{$video->subtitles}}" srclang="en" default />
            @endif
         </video>
         
      </div>

   </section>
   
@endsection
