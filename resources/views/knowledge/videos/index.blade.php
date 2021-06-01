@extends('templates.master')
@section('content')

@include('templates.breadcrumbs')

   <section class="videos-page">
      <div class="videos-list">
         {{-- used for custom id --}}
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

                  <?php 
                     $appLocale = \App::currentLocale(); 
                     //genereate translation column names
                     $v_title = $appLocale . 'Title';   
                  ?>

                  <p>{{$video[$v_title]}}</p>
                  <span>
                     <?php 
                        $date = \Carbon\Carbon::parse($video->created_at);
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
