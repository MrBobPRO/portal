@extends('templates.master')
@section('content')

@include('templates.breadcrumbs')

   <section class="entertainment-videos-single-page">
      
      <div class="single-video">
         {{-- Custom id used in js --}}
         <video class="plyr" playsinline controls id="player0"
            data-poster="/videos/entertainment/posters/{{$entertainment->poster}}">
            @if($entertainment->from_catalog)
               <source src="{{asset('catalog/videos/' . $entertainment->filename)}}">
            @else
               <source src="{{asset('videos/entertainment/' . $entertainment->filename)}}">
            @endif
         
            @if($entertainment->subtitles != '')
               <track kind="captions" label="English" src="/videos/entertainment/subtitles/{{$entertainment->subtitles}}" srclang="en" default />
            @endif
         </video>
         
      </div>

   </section>
   
@endsection
