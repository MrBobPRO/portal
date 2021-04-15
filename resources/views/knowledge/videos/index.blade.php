@extends('templates.master')
@section('content')

   <section class="videos-page">

      <div class="knowledge-header">

         <h3 class="title"> {{ __( $material->name ) }} </h3>

         <ul class="crumbs">
            <li class="crumbs-items">
               <a href=" {{ route('home.index') }} "> {{ __('Главная') }} </a>
               <i class="fa fa-square-full"></i>
            </li>
            <li class="crumbs-items">
               <a href=" {{ route('knowledge.index') }} "> {{ __('Центр знаний') }} </a>
               <i class="fa fa-square-full"></i>
            </li>
            <li class="crumbs-items">
               <a> {{ __( $material->name ) }} </a>
            </li>
         </ul>  

      </div>

      <div class="video-gallery">
         <div class="video-player">
            <video id="video_id" src=" {{ asset('videos/' . $videos[0]['videoSrc']) }} " autoplay controls></video>
         </div>
         <ul>

            @foreach ($videos as $video)

               <li class="video-items">
                  <img src="{{ asset('img/videos/' . $video->image) }}" data-id=" {{ asset('videos/' . $video->videoSrc) }} ">
                  <div class="play-icon">
                     <div class="img">
                        <img src="{{ asset('img/entertainment/play.svg') }}">
                     </div>
                  </div>   
               </li>

            @endforeach

         </ul>

         {{ $videos->links() }}

      </div>

   </section>

@endsection