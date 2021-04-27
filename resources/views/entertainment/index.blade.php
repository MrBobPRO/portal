@extends('templates.master')
@section('content')

@include('templates.breadcrumbs')

   <section class="entertainment-page">
      <div class="videos-list">
         <?php $count = 1; ?>
         @foreach ($videos as $video)
            <div class="single-video">
               {{-- Custom id used in js --}}
               <video class="plyr" playsinline controls id="player{{$count}}" data-poster="/img/news/6.jpg">
                  <source src="\videos\entertainment\{{$video->filename}}"/>
               
                  @if($video->subtitles != '')
                     <track kind="captions" label="English" src="\videos\entertainment\subtitles\{{$video->subtitles}}" srclang="en" default />
                  @endif
               </video>
               
               <div class="video-description">
                  <p>{{$video->title}}</p>
                  <span>
                     <?php 
                        $date = \Carbon\Carbon::parse($video->created_at)->locale('ru');
                        $formatted = $date->isoFormat('DD.MM.YYYY');
                     ?>
                     {{$formatted}}
                  </span>
               </div>
               
            </div>
            <?php $count++ ?>
      @endforeach
      </div>

      {{$videos->links()}}

   </section>
   
@endsection
