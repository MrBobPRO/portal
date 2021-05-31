@extends('dashboard.templates.no_sidebar_master')

@section('content')

   <section class="knowledge-page">
      
      <div class="dash-search-container">
         {{-- Books search start --}}
         <div class="select2_single_container">
            <select class="select2_single select2_single_linked" data-placeholder="Поиск новостей..." data-dropdown-css-class="select2_single_dropdown">
               <option></option>
               @foreach($allVideos as $allVideo)
                  <option value="{{ route('dashboard.knowledge.videos.single', $allVideo->id)}}">{{$allVideo->title}}</option>   
               @endforeach
            </select>
         </div>
         {{-- Books search end --}}
         <a class="add-button" href="{{route('dashboard.knowledge.create')}}"><span class="material-icons-outlined">add</span></a>
      </div>

      
      <div class="primary-list-titles">
         <div class="width-33">Заголовок</div>
         <div class="width-33">Категория</div>
         <div class="width-33">Дата добавления</div>
      </div>

      <div class="primary-list">
         @foreach($videos as $video)
            <a class="primary-list-item" href="{{ route('dashboard.knowledge.videos.single', $video->id)}}">
               <div class="width-33">{{ $video->title }}</div>
               <div class="width-33">{{ $video->ruCategory }}</div>
               <div class="width-33">
                  <?php 
                     $date = \Carbon\Carbon::parse($video->created_at)->locale('ru');
                     $formatted = $date->isoFormat('DD MMMM YYYY H:mm:s');
                  ?>
                  {{$formatted}}
               </div>
            </a>
         @endforeach
      </div>

      {{$videos->links()}}
      
   </section>

@endsection