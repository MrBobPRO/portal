@extends('templates.master')
@section('content')

   <section class="entertainment-page">
      
      <div class="companynews-header">

         <h3 class="title">{{ __('Развлечения') }}</h3>

         <ul class="crumbs">
            <li class="crumbs-items">
               <a href="/">{{ __('Главная') }}</a>
               <i class="fa fa-square-full"></i>
            </li>
            <li class="crumbs-items">
               <a>{{ __('Развлечения') }}</a>
            </li>
         </ul>  
            
      </div>

      <div class="entertainment-video">
         <div class="play-video">
            <video id="video_id" src="{{ asset('video/' . $videos[0]->videoSrc) }}" autoplay controls></video>
         </div>
     
         <ul class="video-gallery">

            @foreach ($videos as $video)
                
               <li class="video-gallery-items">
                  <img src="{{ asset('img/entertainment/' . $video->imageSrc) }}" data-id="video/{{ $video->videoSrc }}">
                  <div class="play-icon">
                     <img src="{{ asset('img/entertainment/play.svg') }}">
                  </div>
               </li>
            
            @endforeach
         
         </ul>
         
         {{ $videos->links() }}
     
      </div>

   </section>
   
@endsection