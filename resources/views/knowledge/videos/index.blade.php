@extends('templates.master')
@section('content')

@include('templates.breadcrumbs')

   <section class="videos-page">
      <div class="videos-list">
         <?php $count = 0; ?>
         @foreach ($videos as $video)
            <div class="single-video">
               {{-- Custom id used in js --}}
               <video class="plyr" playsinline controls id="player{{$count}}" onplay="pauseInactivePlayers({{$count}})"
                  data-poster="/videos/knowledge/posters/{{$video->poster}}">
                  <source src="/videos/knowledge/{{$video->filename}}"/>
               
                  @if($video->subtitles != '')
                     <track kind="captions" label="English" src="/videos/knowledge/subtitles/{{$video->subtitles}}" srclang="en" default />
                  @endif
               </video>
               
               <div class="video-description">
                  <p>{{$video->ruTitle}}</p>
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
